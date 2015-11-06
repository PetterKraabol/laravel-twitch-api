<?php

namespace Zarlach\TwitchApi\Providers;

use Illuminate\Support\ServiceProvider;

class TwitchApiServiceProvider extends ServiceProvider
{
    // Register service provider
    public function register()
    {
        $this->app->bind('Zarlach\TwitchApi\Services\TwitchApiService', 'Zarlach\TwitchApi\Services\TwitchApiService');
    }

    // Boot
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/twitch-api.php' => config_path('twitch-api.php');
        ]);
    }
}
