<?php

namespace Zarlach\TwitchApi\API;

class Games extends Api
{
    // Get list of top games
    public function topGames($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'games/top', false, $options, $availableOptions);
    }
}
