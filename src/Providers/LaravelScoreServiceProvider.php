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

    /**
     * Boot the application's service providers.
     */
    public function boot(): void
    {
        // Config
        $this->publishes([
            __DIR__ . '/../../config/laravel-score.php' => config_path('laravel-score.php'),
        ], 'laravel-score-config');

        // Migrations
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'laravel-score-migrations');
    }
}
