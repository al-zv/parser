<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;  
//use App\VkService;

class GetVkUsers
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vk_service;
    /**
     * Создание нового экземпляра события.
     *
     * @return void
     */
    public function __construct($vk_service)
    {
        $this->vk_service = $vk_service;
    }
}
