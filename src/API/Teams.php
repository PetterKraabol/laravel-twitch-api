<?php

namespace Zarlach\TwitchApi\API;

class Teams extends Api
{
    // List of active streams
    public function teams($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'teams', false, $options, $availableOptions);
    }

    // Get team object
    public function team($team)
    {
        return $this->sendRequest('GET', 'teams/'.$team);
    }
}