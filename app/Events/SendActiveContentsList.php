<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendActiveContentsList implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $screen;
    public $contents;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($screen, $contents)
    {
        $this->screen = $screen;
        $this->contents = $contents;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('screens.' . $this->screen->systemref);
    }
}
