<?php

namespace Binafy\LaravelScore;

use Illuminate\Support\ServiceProvider;

class LaravelScoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/');
    }
}
