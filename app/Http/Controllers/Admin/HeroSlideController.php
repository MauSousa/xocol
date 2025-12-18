<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlide;

class HeroSlideController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::all();

        return view('admin.hero_slides.index', compact('heroSlides'));
    }

    public function create()
    {
        return view('admin.hero_slides.form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // validación
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            // 'image_url' => 'required|url',
            'cta_text' => 'nullable|string|max:100',
            // 'cta_link' => 'nullable|url',
        ]);

        // dd($validated);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // if ($request->hasFile('image_url')) {
        //     $path = $request->file('image_url')->store('hero_slides', 'public');
        //     $validated['image_url'] = '/storage/' . $path;
        // }

        HeroSlide::create($validated);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide created successfully.');


    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.form', [
            'heroSlide' => $heroSlide,
        ]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:100',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $heroSlide->update($validated);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $heroSlide->delete();

        return redirect()->route('admin.hero_slides.index')->with('success', 'Hero slide deleted successfully.');
    }
}
