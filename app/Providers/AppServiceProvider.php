<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(ImageManager::class, function () {
            // Buat dan kembalikan ImageManager dengan driver GD yang sudah dibuat
            return new ImageManager(new Driver());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Carbon::setLocale('id');
        Blade::component('layouts.app', 'app-layout');

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
