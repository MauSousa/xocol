<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use App\Models\Service;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $serviceSlug = $request->query('service');

        $services = Service::query()
            ->where('is_active', true)
            ->whereHas('projects', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('name')
            ->get();

        $projectsQuery = Project::query()
            ->where('is_active', true)
            ->with('services')
            ->orderBy('published_at', 'desc');

        if ($serviceSlug) {
            $projectsQuery->whereHas('services', function ($query) use ($serviceSlug) {
                $query->where('slug', $serviceSlug)
                    ->where('is_active', true);
            });
        }

        $projects = $projectsQuery->paginate(12)->withQueryString();

        return view('projects', [
            'services' => $services,
            'projects' => $projects,
            'activeService' => $serviceSlug,
        ]);
    }
}
