<?php

namespace App\Events;

use App\User;
use App\Project;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserInvitedInProject
{
    use Dispatchable, SerializesModels;

    public $project;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Project $project, User $user)
    {
        $this->project = $project;
        $this->user = $user;
    }
}
