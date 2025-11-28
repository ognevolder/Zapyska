<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class UserView
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $viewUrl;
    /**
     * Create a new event instance.
     */
    public function __construct(Request $request)
    {
        $this->viewUrl = $request->getRequestUri();
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
