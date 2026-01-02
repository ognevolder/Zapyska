<?php

namespace App\Listeners\Auth;

use App\Events\Auth\AdminLogin;
use App\Models\ActivityLog;

class LogAdminLogin
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
    public function handle(AdminLogin $event): void
    {
        ActivityLog::create([
            'event' => 'Адмін | Авторизація',
            'user_id' => $event->admin->id,
            'data' => [
                'guard' => 'admin'
            ]
        ]);
    }
}
