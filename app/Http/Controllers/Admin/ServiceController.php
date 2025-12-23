<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(private readonly ServiceService $serviceService)
    {
    }

    public function index()
    {
        $services = Service::with('projects')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $projects = Project::orderBy('title')->get();

        return view('admin.services.form', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        $projectIds = $validated['projects'] ?? [];
        unset($validated['projects']);

        $this->serviceService->create($validated, $projectIds);

        return redirect()->route('admin.services.index')
            ->with('success', 'Servicio creado correctamente.');
    }

    public function edit(Service $service)
    {
        $service->load('projects');
        $projects = Project::orderBy('title')->get();

        return view('admin.services.form', compact('service', 'projects'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateRequest($request, $service);

        $projectIds = $validated['projects'] ?? [];
        unset($validated['projects']);

        $this->serviceService->update($service, $validated, $projectIds);

        return redirect()->route('admin.services.index')
            ->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Service $service)
    {
        $this->serviceService->delete($service);

        return redirect()->route('admin.services.index')
            ->with('success', 'Servicio eliminado correctamente.');
    }

    private function validateRequest(Request $request, ?Service $service = null): array
    {
        $serviceId = $service?->id;

        return $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $serviceId,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'projects' => 'nullable|array',
            'projects.*' => 'integer|exists:projects,id',
        ]);
    }
}
