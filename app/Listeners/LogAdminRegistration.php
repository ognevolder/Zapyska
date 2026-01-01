<?php

namespace App\Listeners;

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
            'data' => ['key' => $event->key],
            'user_id' => $event->admin->id
        ]);
    }
}
