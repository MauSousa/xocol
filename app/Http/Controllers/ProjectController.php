<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use App\Models\Service;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('name')->get();
        $projects = Project::query()
            ->where('is_active', true)
            ->with('services')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('projects', [
            'services' => $services,
            'projects' => $projects,
        ]);
    }
}
