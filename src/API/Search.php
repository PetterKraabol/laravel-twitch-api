<?php

namespace Zarlach\TwitchApi\API;

class Search extends Api
{
    // Search channels
    public function searchChannels($options)
    {
        $availableOptions = ['query', 'limit', 'offset'];

        return $this->sendRequest('GET', 'search/channels', false, $options, $availableOptions);
    }
}