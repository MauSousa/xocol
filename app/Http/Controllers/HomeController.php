<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(3)
            ->get();

        $services = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(4)
            ->get();

        $projects = Project::query()
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->orderBy('title')
            ->take(4)
            ->get();

        $testimonials = Testimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('author_name')
            ->take(3)
            ->get();

        return view('index', compact('heroSlides', 'services', 'projects', 'testimonials'));
    }
}
