<?php

namespace App\Listeners;

use App\Events\EmailVerified;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserEmailVerification
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
    public function handle(EmailVerified $event): void
    {
        ActivityLog::create([
            'event' => 'Підтвердження електронної пошти',
            'user_id' => $event->user->id,
            'data' => [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ]);
    }
}
