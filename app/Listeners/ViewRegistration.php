<?php

namespace App\Listeners;

use App\Events\UserView;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewRegistration
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
    public function handle(UserView $event): void
    {
        ActivityLog::create([
            'event' => 'Перегляд сторінки',
            'user_id' => 1,
            'data' => [
                'ip' => request()->session()->getId(),
                'path' => request()->getRequestUri()
            ]
        ]);
    }
}
