<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroSlide\StoreHeroSlide;
use App\Http\Requests\HeroSlide\UpdateHeroSlide;
use Illuminate\Http\Request;
use App\Models\HeroSlide;
use Illuminate\Support\Facades\Storage;
use App\Services\HeroSlide\HeroSlideService;

class HeroSlideController extends Controller
{
    public function __construct(protected HeroSlideService $heroSlideService)
    {}

    public function index()
    {
        $heroSlides = $this->heroSlideService->getHeroSlides();

        return view('admin.hero_slides.index', compact('heroSlides'));
    }

    public function create()
    {
        return view('admin.hero_slides.form');
    }

    public function store(StoreHeroSlide $request)
    {
        $file = $request->file('image_path');

        $this->heroSlideService->store($request->validated(), $file);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.form', [
            'heroSlide' => $heroSlide,
        ]);
    }

    public function update(UpdateHeroSlide $request, HeroSlide $heroSlide)
    {
        $file = $request->file('image_path');

        $this->heroSlideService->update($heroSlide, $request->validated(), $file);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->heroSlideService->destroy($heroSlide);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide deleted successfully.');
    }
}
