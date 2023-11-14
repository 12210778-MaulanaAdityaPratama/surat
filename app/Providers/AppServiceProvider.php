<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NotifikasiModel;
use Illuminate\Support\Facades\View;

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
            $notifications = NotifikasiModel::latest()->take(5)->get();
            $view->with('notifications', $notifications);
        });
    }
}
