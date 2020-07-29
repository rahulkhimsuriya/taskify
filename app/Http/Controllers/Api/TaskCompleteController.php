<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskCompleteController extends Controller
{
    public function update(Task $task)
    {
        $method = $task->isCompleted() ? 'incomplete' : 'complete';

        return $this->$method($task);
    }

    protected function complete($task)
    {
        $task->complete();

        return response()->json(['message' => 'Task marked complete.','data' => $task->fresh()], 201);
    }

    protected function incomplete($task)
    {
        $task->incomplete();

        return response()->json(['message' => 'Task marked incomplete.','data' => $task->fresh()], 201);
    }
}
