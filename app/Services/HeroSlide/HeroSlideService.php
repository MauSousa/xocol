<?php

namespace App\Services\HeroSlide;
use App\Models\HeroSlide;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class HeroSlideService
{
    public function getHeroSlides()
    {
        return \App\Models\HeroSlide::all();
    }

    public function store(array $data, ?UploadedFile $imageFile = null)
    {
        if ($imageFile) {
            $data['image_path'] = $this->storeImage($imageFile);
        }

        return \App\Models\HeroSlide::create($data);
    }

    public function update(HeroSlide $heroSlide, array $data, ?UploadedFile $imageFile = null)
    {
        $this->deleteImageIfExists($heroSlide);
        $data['image_path'] = null;

        if ($imageFile) {
            $data['image_path'] = $this->storeImage($imageFile);
        }

        $heroSlide->update($data);

        return $heroSlide;
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->deleteImageIfExists($heroSlide);

        return $heroSlide->delete();
    }

    private function storeImage(UploadedFile $file): string
    {
        $path = $file->store('hero_slides', 'public');
        return '/storage/' . $path;
    }

    private function deleteImageIfExists(HeroSlide $heroSlide)
    {
        if ($heroSlide->image_path) {
            $oldImagePath = str_replace('/storage/', '', $heroSlide->image_path);
            Storage::disk('public')->delete($oldImagePath);
        }
    }
}
