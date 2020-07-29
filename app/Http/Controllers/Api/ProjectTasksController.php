<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTasksController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $validateData = $request->validate([
            'body' => ['required', 'string', 'min:3', 'max:150']
        ]);

        $task = $project->createTask($request->body);

        return response()->json(['message' => 'Task created successfully.','data' => $task], 201);
    }
}
