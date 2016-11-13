<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/streams.md.
 */
class Streams extends Api
{
    /**
     * Stream info (if channel is live).
     *
     * @param string $channel Channel name
     *
     * @return JSON Stream object
     */
    public function streamsChannel($channel)
    {
        return $this->sendRequest('GET', 'streams/'.$channel);
    }

    /**
     * List of streams, ordered by the number of viewers.
     *
     * @param arrat $options List options
     *
     * @return JSON List of streams
     */
    public function streams($options)
    {
        $availableOptions = ['game', 'channel', 'limit', 'offset', 'client_id'];

        return $this->sendRequest('GET', 'streams', false, $options, $availableOptions);
    }

    /**
     * Return featured/promoted streams.
     *
     * @param array $options Featured stream list options
     *
     * @return JSON List of featured/promoted streams
     */
    public function streamsFeatured($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'streams/featured', false, $options, $availableOptions);
    }

    /**
     * Summary of active streams.
     *
     * @param array $options Active streams list options
     *
     * @return JSON List of active streams
     */
    public function streamSummaries($options = [])
    {
        $availableOptions = ['game', 'limit', 'offset'];

        return $this->sendRequest('GET', 'streams/summary', false, $options, $availableOptions);
    }
}
