<?php

namespace Binafy\LaravelScore\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelScoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/');
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-score.php', 'laravel-score');
    }
}
