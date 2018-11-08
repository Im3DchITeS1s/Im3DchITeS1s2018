<?php

namespace App\Events;

use App\TipoEmail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreatedTipoEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tipo_email;

    public function __construct(TipoEmail $tipo_email)
    {
        $this->tipo_email = $tipo_email;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
