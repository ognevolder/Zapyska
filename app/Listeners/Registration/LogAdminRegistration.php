<?php

namespace App\Listeners\Registration;

use App\Events\Registration\AdminRegistration;
use App\Models\ActivityLog;

class LogAdminRegistration
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
    public function handle(AdminRegistration $event): void
    {
        ActivityLog::create([
            'event' => 'Адмін | Реєстрація',
            'user_id' => $event->admin->id,
            'data' => [
                'key' => $event->key
            ],
        ]);
    }
}
