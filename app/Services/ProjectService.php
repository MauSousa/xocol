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
        array $galleryImages = [],
        array $serviceIds = []
    ): Project {
        $payload = $this->normalizePayload($data);
        $storedCover = null;
        $storedGallery = [];

        if ($coverImage) {
            $storedCover = $this->storeImage($coverImage, 'projects/cover');
            $payload['cover_image'] = $storedCover;
        }

        if ($galleryImages) {
            $storedGallery = $this->storeGalleryImages($galleryImages);
            $payload['gallery_images'] = $storedGallery;
        }

        try {
            return DB::transaction(function () use ($payload, $serviceIds) {
                $project = Project::create($payload);
                $project->services()->sync($serviceIds);

                return $project;
            });
        } catch (\Throwable $exception) {
            $this->deleteImage($storedCover);
            $this->deleteImages($storedGallery);

            throw $exception;
        }
    }

    public function update(
        Project $project,
        array $data,
        ?UploadedFile $coverImage = null,
        array $galleryImages = [],
        array $serviceIds = [],
        array $existingGalleryImages = [],
        array $removeGalleryImages = []
    ): Project {
        $payload = $this->normalizePayload($data, $project);
        $storedCover = null;
        $storedGallery = [];

        if ($coverImage) {
            $storedCover = $this->storeImage($coverImage, 'projects/cover');
            $payload['cover_image'] = $storedCover;
        }

        $currentGalleryImages = $existingGalleryImages ?: ($project->gallery_images ?? []);
        $filteredGalleryImages = array_values(array_diff($currentGalleryImages, $removeGalleryImages));
        $storedGallery = $galleryImages ? $this->storeGalleryImages($galleryImages) : [];
        $payload['gallery_images'] = array_values(array_merge($filteredGalleryImages, $storedGallery));

        $oldCover = $project->cover_image;
        $toRemoveGallery = $removeGalleryImages;

        try {
            $updatedProject = DB::transaction(function () use ($project, $payload, $serviceIds) {
                $project->update($payload);
                $project->services()->sync($serviceIds);

                return $project;
            });
        } catch (\Throwable $exception) {
            $this->deleteImage($storedCover);
            $this->deleteImages($storedGallery);

            throw $exception;
        }

        if ($storedCover) {
            $this->deleteImage($oldCover);
        }

        if ($toRemoveGallery) {
            $this->deleteImages($toRemoveGallery);
        }

        return $updatedProject;
    }

    public function delete(Project $project): void
    {
        $coverImage = $project->cover_image;
        $galleryImages = $project->gallery_images ?? [];

        DB::transaction(function () use ($project) {
            $project->services()->detach();
            $project->delete();
        });

        $this->deleteImage($coverImage);
        $this->deleteImages($galleryImages);
    }

    private function normalizePayload(array $data, ?Project $project = null): array
    {
        $payload = Arr::only($data, [
            'title',
            'slug',
            'content',
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
