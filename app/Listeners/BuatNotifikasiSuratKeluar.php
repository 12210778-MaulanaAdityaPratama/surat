<?php

namespace App\Listeners;

use App\Events\SuratKeluarEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuatNotifikasiSuratKeluar
{
    /**
     * Create the event listener.
     */

    /**
     * Handle the event.
     */
    public function handle(SuratKeluarEvent $event)
    {
        $suratkeluar = $event->suratkeluar;
    }
}
