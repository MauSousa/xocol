<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \Illuminate\Contracts\View\View;
use App\Models\Service;
use App\Models\Project;
use App\Models\ProjectView;
use App\Models\ProjectLike;

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

    public function show(Request $request, Project $project): View
    {
        $sessionId = $request->session()->getId();
        $view = ProjectView::firstOrCreate([
            'project_id' => $project->id,
            'session_id' => $sessionId,
        ]);
        if ($view->wasRecentlyCreated) {
            $project->increment('views_count');
        }

        $project->load(['services', 'blocks']);
        $relatedProjects = Project::query()
            ->where('is_active', true)
            ->whereKeyNot($project->id)
            ->with('services')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('project', [
            'project' => $project,
            'hasLiked' => ProjectLike::query()
                ->where('project_id', $project->id)
                ->where('session_id', $sessionId)
                ->exists(),
            'relatedProjects' => $relatedProjects,
        ]);
    }

    public function like(Request $request, Project $project): JsonResponse
    {
        $sessionId = $request->session()->getId();
        $existingLike = ProjectLike::query()
            ->where('project_id', $project->id)
            ->where('session_id', $sessionId)
            ->exists();

        if ($existingLike) {
            return response()->json([
                'liked' => true,
                'likes_count' => $project->likes_count,
            ]);
        }

        $like = ProjectLike::firstOrCreate([
            'project_id' => $project->id,
            'session_id' => $sessionId,
        ]);
        if ($like->wasRecentlyCreated) {
            $project->increment('likes_count');
        }

        return response()->json([
            'liked' => true,
            'likes_count' => $project->likes_count,
        ]);
    }
}
