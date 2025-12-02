<?php

namespace App\Listeners;

use App\Events\UserView;
use App\Models\View;

class ViewRegistration
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
    public function handle(UserView $event): void
    {
        View::create([
            'path' => $event->path,
            'post_id' => $event->post->id ?? null,
            'user_id' => $event->user->id ?? null,
            'session_id' => $event->guest->id ?? null
        ]);
    }
}
