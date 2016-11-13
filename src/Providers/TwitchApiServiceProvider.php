<?php

namespace Zarlach\TwitchApi\Providers;

use Illuminate\Support\ServiceProvider;

class TwitchApiServiceProvider extends ServiceProvider
{
    // Register service provider
    public function register()
    {
        $this->registerServices();
    }

    // Boot
    public function boot()
    {
        $this->addConfig();
    }

    // Register services
    private function registerServices()
    {
        $this->app->bind('Zarlach\TwitchApi\Services\TwitchApiService', 'Zarlach\TwitchApi\Services\TwitchApiService');
    }

    // Add config file
    private function addConfig()
    {
        $this->publishes([
            __DIR__.'/../../config/twitch-api.php' => config_path('twitch-api.php'),
        ]);
    }
}
