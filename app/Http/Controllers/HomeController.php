<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('author_name')
            ->take(3)
            ->get();

        return view('index', compact('testimonials'));
    }
}
