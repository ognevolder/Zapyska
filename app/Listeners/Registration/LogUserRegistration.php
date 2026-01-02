<?php

namespace App\Listeners\Registration;

use App\Events\Registration\UserRegistration;
use App\Models\ActivityLog;

class LogUserRegistration
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
    public function handle(UserRegistration $event): void
    {
        ActivityLog::create([
            'event' => 'Реєстрація',
            'user_id' => $event->user->id,
            'data' => [
                'guard' => 'web'
            ]
        ]);
    }
}
