<?php

namespace App\Listeners;

use App\Events\UserLogin;
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
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ]);
    }
}
