<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RealTimeMessagePrivate implements ShouldBroadcast
{
    use SerializesModels;

    public string $notification;

    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('event-private');
    }
}
