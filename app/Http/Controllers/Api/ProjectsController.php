<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Project\ProjectCreateRequest;
use App\Http\Requests\Api\Project\ProjectUpdateRequest;
use App\Http\Resources\Api\Project\ProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects;

        return response()->json(['data' => ProjectResource::collection($projects)], 200);
    }

    public function store(ProjectCreateRequest $request)
    {
        $project = Auth::user()->projects()->create($request->toArray());

        return response()->json(
            [
            'message' => 'Projects created successfully.',
            'data' => new ProjectResource($project)
            ],
            201
        );
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        
        $project->load(['owner', 'tasks']);

        return response()->json(['data' => $project], 200);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->toArray());

        return response()->json(
            [
            'message' => 'Projects updated successfully.',
            'data' => new ProjectResource($project->fresh())
            ],
            201
        );
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return response()->json(['message' => 'Projects deleted successfully.',], 204);
    }
}
