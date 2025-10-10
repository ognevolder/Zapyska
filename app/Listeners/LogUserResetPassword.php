<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserResetPassword
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
    public function handle(PasswordReset $event): void
    {
        ActivityLog::create([
            'event' => 'Відновлення паролю',
            'user_id' => $event->user->id,
            'data' => [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ]);
    }
}
