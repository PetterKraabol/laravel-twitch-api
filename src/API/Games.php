<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/games.md.
 */
class Games extends Api
{
    /**
     * List of top games.
     *
     * @param array $options List options
     *
     * @return JSON List of games
     */
    public function topGames($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'games/top', false, $options, $availableOptions);
    }
}
