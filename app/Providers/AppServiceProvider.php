<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NotifikasiModel;
use App\Models\SuratKeluarNotifikasi;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layout', function ($view) {
            $suratMasukNotifications = NotifikasiModel::where('dibaca', false)->latest()->take(3)->get();
            $suratKeluarNotifications = SuratKeluarNotifikasi::where('dibaca', false)->latest()->take(3)->get();
        
            $notifications = $suratMasukNotifications->merge($suratKeluarNotifications);
        
            $badgeCount = $notifications->count(); // Jumlah notifikasi belum dibaca
        
            $view->with('notifications', $notifications)->with('badgeCount', $badgeCount);
            Paginator::useBootstrapFive();
            Paginator::useBootstrapFour();
        });
    }
}
