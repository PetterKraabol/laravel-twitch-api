<?php

namespace Zarlach\TwitchApi\API;

class Root extends Api
{
    // API root
    public function root()
    {
        return $this->sendRequest('GET');
    }

    // Authenticated API root
    public function authRoot($token = null)
    {
        return $this->sendRequest('GET', '', $this->getToken($token));
    }
}