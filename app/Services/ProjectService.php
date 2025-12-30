<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectService
{
    public function create(
        array $data,
        ?UploadedFile $coverImage = null,
        array $galleryImages = [],
        array $serviceIds = []
    ): Project {
        $payload = $this->normalizePayload($data);

        if ($coverImage) {
            $payload['cover_image'] = $this->storeImage($coverImage, 'projects/cover');
        }

        if ($galleryImages) {
            $payload['gallery_images'] = $this->storeGalleryImages($galleryImages);
        }

        $project = Project::create($payload);
        $project->services()->sync($serviceIds);

        return $project;
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

        if ($coverImage) {
            $this->deleteImage($project->cover_image);
            $payload['cover_image'] = $this->storeImage($coverImage, 'projects/cover');
        }

        $currentGalleryImages = $existingGalleryImages ?: ($project->gallery_images ?? []);
        $filteredGalleryImages = array_values(array_diff($currentGalleryImages, $removeGalleryImages));

        if ($removeGalleryImages) {
            $this->deleteImages($removeGalleryImages);
        }

        $newGalleryImages = $galleryImages ? $this->storeGalleryImages($galleryImages) : [];
        $payload['gallery_images'] = array_values(array_merge($filteredGalleryImages, $newGalleryImages));

        $project->update($payload);
        $project->services()->sync($serviceIds);

        return $project;
    }

    public function delete(Project $project): void
    {
        $project->services()->detach();

        $this->deleteImage($project->cover_image);
        $this->deleteImages($project->gallery_images ?? []);

        $project->delete();
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
            $payload['slug'] = Str::slug($payload['title']);
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
