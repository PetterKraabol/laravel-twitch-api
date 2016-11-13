<?php

namespace Zarlach\TwitchApi\Facades;

use Illuminate\Support\Facades\Facade;

class TwitchApiServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Zarlach\TwitchApi\Services\TwitchApiService';
    }
}
