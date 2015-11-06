<?php

namespace Zarlach\TwitchApi\Providers;

use Illuminate\Support\ServiceProvider;

class TwitchApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    public function boot()
    {
        $this->addConfig();
    }

    private function registerServices()
    {
        $this->app->bind('Zarlach\TwitchApi\Services\TwitchApiService', 'Zarlach\TwitchApi\Services\TwitchApiService');
    }

    private function addConfig()
    {
        $this->publishes([
            __DIR__.'/../../config/twitch-api.php' => config_path('twitch-api.php');
        ]);
    }
}
