<?php

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class TestimonialService
{
    public function list()
    {
        return Testimonial::query()
            ->orderBy('sort_order')
            ->orderBy('author_name')
            ->get();
    }

    public function create(array $data, ?UploadedFile $avatarFile = null): Testimonial
    {
        $payload = $this->normalizePayload($data);

        if ($avatarFile) {
            $payload['avatar_url'] = $this->storeImage($avatarFile);
        }

        return Testimonial::create($payload);
    }

    public function update(Testimonial $testimonial, array $data, ?UploadedFile $avatarFile = null): Testimonial
    {
        $payload = $this->normalizePayload($data, $testimonial);

        if ($avatarFile) {
            $this->deleteImageIfExists($testimonial);
            $payload['avatar_url'] = $this->storeImage($avatarFile);
        }

        $testimonial->update($payload);

        return $testimonial;
    }

    public function delete(Testimonial $testimonial): void
    {
        $this->deleteImageIfExists($testimonial);
        $testimonial->delete();
    }

    private function normalizePayload(array $data, ?Testimonial $testimonial = null): array
    {
        $payload = Arr::only($data, [
            'author_name',
            'author_title',
            'quote',
            'avatar_url',
            'rating',
            'sort_order',
            'is_active',
        ]);

        if (!array_key_exists('rating', $payload) || $payload['rating'] === null) {
            $payload['rating'] = $testimonial?->rating ?? 5;
        }

        if (!array_key_exists('is_active', $payload)) {
            $payload['is_active'] = $testimonial?->is_active ?? true;
        }

        return $payload;
    }

    private function storeImage(UploadedFile $file): string
    {
        $path = $file->store('testimonials', 'public');

        return '/storage/' . $path;
    }

    private function deleteImageIfExists(Testimonial $testimonial): void
    {
        if (!$testimonial->avatar_url) {
            return;
        }

        $oldImagePath = str_replace('/storage/', '', $testimonial->avatar_url);
        Storage::disk('public')->delete($oldImagePath);
    }
}
