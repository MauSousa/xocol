<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProject;
use App\Http\Requests\Project\UpdateProject;
use App\Models\Project;
use App\Models\Service;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(private readonly ProjectService $projectService)
    {
    }

    public function index()
    {
        $projects = $this->projectService->list();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::orderBy('name')->get();

        return view('admin.projects.form', compact('services'));
    }

    public function store(StoreProject $request)
    {
        $validated = $request->validated();
        // dd($request->all());
        $serviceIds = $validated['services'] ?? [];
        unset($validated['services']);

        $coverImage = $request->file('cover_image');
        $gridImage = $request->file('grid_image');
        $galleryImages = $request->file('gallery_images', []);

        $this->projectService->create($validated, $coverImage, $gridImage, $galleryImages, $serviceIds);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        $project->load('services');
        $services = Service::orderBy('name')->get();

        return view('admin.projects.form', compact('project', 'services'));
    }

    public function update(UpdateProject $request, Project $project)
    {
        $validated = $request->validated();

        $serviceIds = $validated['services'] ?? [];
        $existingGalleryImages = $validated['existing_gallery_images'] ?? [];
        $removeGalleryImages = $validated['remove_gallery_images'] ?? [];

        unset($validated['services'], $validated['existing_gallery_images'], $validated['remove_gallery_images']);

        $coverImage = $request->file('cover_image');
        $gridImage = $request->file('grid_image');
        $galleryImages = $request->file('gallery_images', []);

        $this->projectService->update(
            $project,
            $validated,
            $coverImage,
            $gridImage,
            $galleryImages,
            $serviceIds,
            $existingGalleryImages,
            $removeGalleryImages
        );

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $this->projectService->delete($project);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}
