<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
    public function handle(NewRegistration $event): void
    {
        ActivityLog::create([
            'event' => 'Реєстрація',
            'user_id' => $event->user->id,
            'data' => [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ]);
    }
}
