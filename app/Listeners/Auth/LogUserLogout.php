<?php

namespace App\Listeners;

use App\Events\UserLogout;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogout
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
    public function handle(UserLogout $event): void
    {
        ActivityLog::create([
            'event' => 'Вихід із системи',
            'user_id' => $event->user->id,
            'data' => [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]
        ]);
    }
}
