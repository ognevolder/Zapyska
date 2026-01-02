<?php

namespace App\Listeners;

use App\Events\Auth\UserLogin;
use App\Models\ActivityLog;


class LogUserLogin
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
    public function handle(UserLogin $event): void
    {
        ActivityLog::create([
            'event' => 'Авторизація',
            'user_id' => $event->user->id,
            'data' => [
                'guard' => 'web'
            ]
        ]);
    }
}
