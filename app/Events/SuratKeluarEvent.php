<?php

namespace App\Events;

use App\Models\SuratKeluarModel;
use App\Models\SuratMasukModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SuratKeluarEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $suratkeluar;

    public function __construct(SuratKeluarModel $suratkeluar)
    {
        $this->suratkeluar = $suratkeluar;
    }
}
