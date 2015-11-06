<?php

namespace Zarlach\TwitchApi\API;

class Streams extends Api
{
    // Get stream info if live
    public function streamsChannel($channel)
    {
        return $this->sendRequest('GET', 'streams/'.$channel);
    }

    // List of streams, ordered by the number of viewers
    public function streams($options)
    {
        $availableOptions = ['game', 'channel', 'limit', 'offset', 'client_id'];

        return $this->sendRequest('GET', 'streams', false, $options, $availableOptions);
    }

    // Returns featured/promoted streams
    public function streamsFeatured($options = [])
    {
        $availableOptions = ['limit', 'offset'];

        return $this->sendRequest('GET', 'streams/featured', false, $options, $availableOptions);
    }

    // Get summary of active streams
    public function streamSummary($options = [])
    {
        $availableOptions = ['game', 'limit', 'offset'];

        return $this->sendRequest('GET', 'streams/summary', false, $options, $availableOptions);
    }
}
