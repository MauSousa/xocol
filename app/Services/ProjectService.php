<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectService
{
    public function list()
    {
        return Project::with('services')
            ->orderByDesc('published_at')
            ->orderBy('title')
            ->get();
    }

    public function create(
        array $data,
        ?UploadedFile $coverImage = null,
        ?UploadedFile $gridImage = null,
        array $galleryImages = [],
        array $serviceIds = [],
        array $blocks = [],
        array $blockFiles = []
    ): Project {
        $payload = $this->normalizePayload($data);
        $storedCover = null;
        $storedGridImage = null;
        $storedGallery = [];
        $storedBlockImages = [];
        $blocksPayload = $this->prepareBlocks($blocks, $blockFiles, $storedBlockImages);

        if ($coverImage) {
            $storedCover = $this->storeImage($coverImage, 'projects/cover');
            $payload['cover_image'] = $storedCover;
        }

        if ($gridImage) {
            $storedGridImage = $this->storeImage($gridImage, 'projects/grid');
            $payload['grid_image'] = $storedGridImage;
        }

        if ($galleryImages) {
            $storedGallery = $this->storeGalleryImages($galleryImages);
            $payload['gallery_images'] = $storedGallery;
        }

        try {
            return DB::transaction(function () use ($payload, $serviceIds, $blocksPayload) {
                $project = Project::create($payload);
                $project->services()->sync($serviceIds);
                if ($blocksPayload) {
                    $project->blocks()->createMany($blocksPayload);
                }

                return $project;
            });
        } catch (\Throwable $exception) {
            $this->deleteImage($storedCover);
            $this->deleteImage($storedGridImage);
            $this->deleteImages($storedGallery);
            $this->deleteImages($storedBlockImages);

            throw $exception;
        }
    }

    public function update(
        Project $project,
        array $data,
        ?UploadedFile $coverImage = null,
        ?UploadedFile $gridImage = null,
        array $galleryImages = [],
        array $serviceIds = [],
        array $existingGalleryImages = [],
        array $removeGalleryImages = [],
        array $blocks = [],
        array $blockFiles = []
    ): Project {
        $payload = $this->normalizePayload($data, $project);
        $storedCover = null;
        $storedGridImage = null;
        $storedGallery = [];
        $storedBlockImages = [];
        $project->load('blocks');
        $oldBlockImages = $this->getBlockImageUrls($project->blocks);
        $blocksPayload = $this->prepareBlocks($blocks, $blockFiles, $storedBlockImages);

        if ($coverImage) {
            $storedCover = $this->storeImage($coverImage, 'projects/cover');
            $payload['cover_image'] = $storedCover;
        }

        if ($gridImage) {
            $storedGridImage = $this->storeImage($gridImage, 'projects/grid');
            $payload['grid_image'] = $storedGridImage;
        }

        $currentGalleryImages = $existingGalleryImages ?: ($project->gallery_images ?? []);
        $filteredGalleryImages = array_values(array_diff($currentGalleryImages, $removeGalleryImages));
        $storedGallery = $galleryImages ? $this->storeGalleryImages($galleryImages) : [];
        $payload['gallery_images'] = array_values(array_merge($filteredGalleryImages, $storedGallery));

        $oldCover = $project->cover_image;
        $oldGridImage = $project->grid_image;
        $toRemoveGallery = $removeGalleryImages;

        try {
        $updatedProject = DB::transaction(function () use ($project, $payload, $serviceIds, $blocksPayload) {
            $project->update($payload);
            $project->services()->sync($serviceIds);
            $project->blocks()->delete();
            if ($blocksPayload) {
                $project->blocks()->createMany($blocksPayload);
            }

            return $project;
        });
    } catch (\Throwable $exception) {
        $this->deleteImage($storedCover);
        $this->deleteImage($storedGridImage);
        $this->deleteImages($storedGallery);
        $this->deleteImages($storedBlockImages);

        throw $exception;
    }

        if ($storedCover) {
            $this->deleteImage($oldCover);
        }

        if ($storedGridImage) {
            $this->deleteImage($oldGridImage);
        }

        if ($toRemoveGallery) {
            $this->deleteImages($toRemoveGallery);
        }

        $newBlockImages = $this->getBlockImageUrls($blocksPayload);
        $blockImagesToRemove = array_values(array_diff($oldBlockImages, $newBlockImages));
        if ($blockImagesToRemove) {
            $this->deleteImages($blockImagesToRemove);
        }

        return $updatedProject;
    }

    public function delete(Project $project): void
    {
        $project->load('blocks');
        $coverImage = $project->cover_image;
        $galleryImages = $project->gallery_images ?? [];
        $blockImages = $this->getBlockImageUrls($project->blocks);

        DB::transaction(function () use ($project) {
            $project->services()->detach();
            $project->delete();
        });

        $this->deleteImage($coverImage);
        $this->deleteImages($galleryImages);
        $this->deleteImages($blockImages);
    }

    private function normalizePayload(array $data, ?Project $project = null): array
    {
        $payload = Arr::only($data, [
            'title',
            'slug',
            'content',
            'grid_image_size',
            'published_at',
            'is_active',
            'is_featured',
        ]);

        if (empty($payload['slug']) && !empty($payload['title'])) {
            $payload['slug'] = $this->generateUniqueSlug($payload['title'], $project);
        }

        if ($project && empty($payload['slug']) && $project->slug) {
            $payload['slug'] = $project->slug;
        }

        return $payload;
    }

    private function storeImage(UploadedFile $file, string $directory): string
    {
        $path = $file->store($directory, 'public');

        return '/storage/' . $path;
    }

    private function storeGalleryImages(array $files): array
    {
        $images = [];

        foreach ($files as $file) {
            if (!$file instanceof UploadedFile) {
                continue;
            }

            $images[] = $this->storeImage($file, 'projects/gallery');
        }

        return $images;
    }

    private function prepareBlocks(array $blocks, array $blockFiles, array &$storedImages = []): array
    {
        $prepared = [];

        foreach ($blocks as $index => $block) {
            $type = $block['type'] ?? null;

            if (!$type) {
                continue;
            }

            $data = $block['data'] ?? [];

            if ($type === 'heading') {
                $text = trim((string) ($data['text'] ?? ''));
                if ($text === '') {
                    continue;
                }
                $prepared[] = [
                    'type' => $type,
                    'data' => ['text' => $text],
                ];
                continue;
            }

            if ($type === 'rich_text') {
                $html = trim((string) ($data['html'] ?? $data['text'] ?? ''));
                if ($html === '') {
                    continue;
                }
                $prepared[] = [
                    'type' => $type,
                    'data' => ['html' => $html],
                ];
                continue;
            }

            if ($type === 'image') {
                $alt = trim((string) ($data['alt'] ?? ''));
                $existingImage = $block['existing_image'] ?? ($data['url'] ?? null);
                $imageFile = $blockFiles[$index]['image'] ?? null;

                $imagePath = null;
                if ($imageFile instanceof UploadedFile) {
                    $imagePath = $this->storeImage($imageFile, 'projects/blocks');
                    $storedImages[] = $imagePath;
                } elseif ($existingImage) {
                    $imagePath = $existingImage;
                }

                if (!$imagePath) {
                    continue;
                }

                $prepared[] = [
                    'type' => $type,
                    'data' => [
                        'url' => $imagePath,
                        'alt' => $alt,
                    ],
                ];
            }
        }

        return $prepared;
    }

    private function getBlockImageUrls(iterable $blocks): array
    {
        $urls = [];

        foreach ($blocks as $block) {
            $data = $block['data'] ?? (is_object($block) ? ($block->data ?? null) : null);
            if (!is_array($data)) {
                continue;
            }
            $url = $data['url'] ?? null;
            if ($url) {
                $urls[] = $url;
            }
        }

        return $urls;
    }

    private function generateUniqueSlug(string $title, ?Project $project = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        while ($this->slugExists($slug, $project)) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function slugExists(string $slug, ?Project $project = null): bool
    {
        return Project::query()
            ->where('slug', $slug)
            ->when($project, fn ($query) => $query->where('id', '!=', $project->id))
            ->exists();
    }

    private function deleteImage(?string $path): void
    {
        if (!$path) {
            return;
        }

        $relativePath = ltrim(str_replace('/storage/', '', $path), '/');
        Storage::disk('public')->delete($relativePath);
    }

    private function deleteImages(array $paths): void
    {
        foreach ($paths as $path) {
            $this->deleteImage($path);
        }
    }
}
