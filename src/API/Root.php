<?php

namespace Zarlach\TwitchApi\API;

class Root extends Api
{
    // API Root
    public function root()
    {
        return $this->sendRequest('GET');
    }
}