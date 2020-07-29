<?php

namespace App\Http\Controllers\Api;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectTasksController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $validateData = $request->validate([
            'body' => ['required', 'string', 'min:3', 'max:150']
        ]);

        $task = $project->createTask($validateData);

        return response()->json(['message' => 'Task created successfully.','data' => $task], 201);
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $validateData = $request->validate([
            'body' => ['string', 'min:3', 'max:150']
        ]);

        $this->authorize('update', $task);

        $task->update($validateData);

        return response()->json(['message' => 'Task updated successfully.','data' => $task->fresh()], 201);
    }
}
