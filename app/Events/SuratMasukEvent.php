<?php

namespace App\Events;

use App\Models\SuratMasukModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SuratMasukEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $suratmasuk;

    public function __construct(SuratMasukModel $suratmasuk)
    {
        $this->suratmasuk = $suratmasuk;
    }
}