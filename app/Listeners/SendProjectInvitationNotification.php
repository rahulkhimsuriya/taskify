<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\UserInvitedInProject;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendProjectInvitaionNotification;

class SendProjectInvitationNotification
{

    /**
     * Handle the event.
     *
     * @param  UserInvitedInProject  $event
     * @return void
     */
    public function handle(UserInvitedInProject $event)
    {
        $event->user->notify(
            (new SendProjectInvitaionNotification($event->project))
            ->delay(Carbon::now()->addSeconds(5))
        );
    }
}
