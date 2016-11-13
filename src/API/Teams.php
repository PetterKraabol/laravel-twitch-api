<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/teams.md.
 */
class Teams extends Api
{
    /**
     * List of active streams.
     *
     * @param array $options Active stream list options
     *
     * @return JSON List of streams
     */
    public function teams($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'teams', false, $options, $availableOptions);
    }

    /**
     * Get a team object.
     *
     * @param string $team Team name
     *
     * @return JSON Team object
     */
    public function team($team)
    {
        return $this->sendRequest('GET', 'teams/'.$team);
    }
}
