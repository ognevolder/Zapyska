<?php

namespace App\Events;

use App\Models\Guest;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Visit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $guest;
    /**
     * Create a new event instance.
     */
    public function __construct(Guest $guest)
    {
        return $this->guest = $guest;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
