<?php

namespace App\Listeners;

use App\Events\DefineLogInEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLogInUpdateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if($event instanceof DefineLogInEvent && $event->user instanceof User) {
            $event->user->last_login_at = now();
            $event->user->save();
        }
    }
}
