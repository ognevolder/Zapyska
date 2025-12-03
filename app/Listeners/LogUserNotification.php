<?php

namespace App\Listeners;

use App\Events\UserNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class LogUserNotification
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
    public function handle(UserNotification $event): void
    {
        Notification::create([
            'user_id' => Auth::id(),
            'message' => $event->message->id
        ]);
    }
}
