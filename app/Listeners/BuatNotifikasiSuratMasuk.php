<?php

namespace App\Listeners;

use App\Events\SuratMasukEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuatNotifikasiSuratMasuk
{
    /**
     * Create the event listener.
     */
    public function handle(SuratMasukEvent $event)
    {
        $suratmasuk = $event->suratmasuk;
        
        // Logika untuk membuat entri notifikasi berdasarkan $suratMasuk
        // ...
    }
}
