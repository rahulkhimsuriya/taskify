<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\User;
use App\Events\UserInvitedInProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Project\ProjectInvitationRequest;
use Illuminate\Http\Request;

class ProjectInvitationsController extends Controller
{
    public function store(ProjectInvitationRequest $request, Project $project)
    {
        $user = User::whereEmail($request->email)->first();

        if ($project->members->contains($user)) {
            return response()->json(['errors' => ['email' => ["User already member of the project."]]], 400);
        }

        if ($project->owner->is($user)) {
            return response()->json(['errors' => ['email' => ["You can not invite yourself."]]], 400);
        }

        $project->invite($user);

        event(new UserInvitedInProject($project, $user));

        return response()->json(['message' => 'User invited in project successfully.'], 201);
    }
}
