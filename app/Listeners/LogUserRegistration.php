<?php

namespace App\Listeners;

use App\Events\UserRegistration;
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
            'user_id' => $event->user->id
        ]);
    }
}
