<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreService;
use App\Http\Requests\Service\UpdateService;
use App\Models\Project;
use App\Models\Service;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    public function __construct(private readonly ServiceService $serviceService)
    {
    }

    public function index()
    {
        $services = $this->serviceService->list();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $projects = Project::orderBy('title')->get();

        return view('admin.services.form', compact('projects'));
    }

    public function store(StoreService $request)
    {
        $validated = $request->validated();

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

    public function update(UpdateService $request, Service $service)
    {
        $validated = $request->validated();

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

}
