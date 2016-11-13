<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/search.md.
 */
class Search extends Api
{
    /**
     * Search channels.
     *
     * @param string $options Search options
     *
     * @return JSON Search results
     */
    public function searchChannels($options)
    {
        $availableOptions = ['query', 'limit', 'offset'];

        return $this->sendRequest('GET', 'search/channels', false, $options, $availableOptions);
    }
}
