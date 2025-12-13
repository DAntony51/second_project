<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $project = Project::create($data);

        return response()->json($project, 201);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project->load(['students']));
    }

    public function update(UpdateRequest $request, Project $project): JsonResponse
    {
        $data = $request->validated();
        $project->update($data);

        return response()->json($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();
        return response()->json(null, 204);
    }
}



