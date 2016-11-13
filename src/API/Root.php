<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/root.md.
 */
class Root extends Api
{
    /**
     * Twitch Kraken API root.
     *
     * @return JSON API root object
     */
    public function root()
    {
        return $this->sendRequest('GET');
    }

    /**
     * Authenticated Twitch Kraken API root.
     *
     * @param string $token Twitch token
     *
     * @return JSON Authenticated API root object
     */
    public function authRoot($token = null)
    {
        return $this->sendRequest('GET', '', $this->getToken($token));
    }
}
