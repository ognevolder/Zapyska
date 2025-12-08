<?php

namespace App\Listeners;

use App\Events\Visit;
use App\Models\GuestVisit;

class LogVisit
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
    public function handle(Visit $event): void
    {
        $visit = GuestVisit::where('guest_id', $event->guest->id)->first();

        if (!$visit) {
            GuestVisit::create([
                'guest_id' => $event->guest->id
            ]);
        }
    }
}
