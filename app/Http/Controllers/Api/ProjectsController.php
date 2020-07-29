<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Project\ProjectCreateRequest;
use App\Http\Resources\Api\Project\ProjectCreateResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        //
    }

    public function store(ProjectCreateRequest $request)
    {
        $project = Auth::user()->projects()->create($request->toArray());

        return response()->json(
            [
            'message' => 'Projects created successfully.',
            'data' => new ProjectCreateResource($project)
            ],
            201
        );
    }

    public function show(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
        //
    }
}
