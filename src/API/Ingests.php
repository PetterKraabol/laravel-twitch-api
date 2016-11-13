<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/ingests.md.
 */
class Ingests extends Api
{
    /**
     * List of servers/ingests.
     *
     * @return JSON List of servers/ingests
     */
    public function ingests()
    {
        return $this->sendRequest('GET', 'ingests');
    }
}
