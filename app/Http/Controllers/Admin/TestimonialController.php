<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\StoreTestimonial;
use App\Http\Requests\Testimonial\UpdateTestimonial;
use App\Models\Testimonial;
use App\Services\TestimonialService;

class TestimonialController extends Controller
{
    public function __construct(private readonly TestimonialService $testimonialService)
    {
    }

    public function index()
    {
        $testimonials = $this->testimonialService->list();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form');
    }

    public function store(StoreTestimonial $request)
    {
        $validated = $request->validated();

        $avatarFile = $request->file('avatar_url');

        $this->testimonialService->create($validated, $avatarFile);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial creado correctamente.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(UpdateTestimonial $request, Testimonial $testimonial)
    {
        $validated = $request->validated();

        $avatarFile = $request->file('avatar_url');

        $this->testimonialService->update($testimonial, $validated, $avatarFile);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial actualizado correctamente.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->testimonialService->delete($testimonial);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial eliminado correctamente.');
    }
}
