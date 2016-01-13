<?php

namespace Zarlach\TwitchApi\API;

class Channels extends API
{
    // Get channel info
    public function channel($channel)
    {
        return $this->sendRequest('GET', 'channels/'.$channel);
    }

    // Get authenticated channel
    public function authenticatedChannel($token = null)
    {
        return $this->sendRequest('GET', 'channel', $this->getToken($token));
    }

    // Update channel
    public function putChannel($channel, $options, $token = null)
    {
        $availableOptions = ['json' => ['channel' => ['status', 'game', 'delay']]];
        $options = ['json' => ['channel' => $options]];

        return $this->sendRequest('PUT', 'channels/'.$channel, $this->getToken($token), $options, $availableOptions);
    }

    // Reset stream key
    public function deleteStreamKey($channel, $token = null)
    {
        return $this->sendRequest('DELETE', 'channels/'.$channel.'/stream_key', $this->getToken($token));
    }

    // Run commercial
    public function postCommercial($channel, $length = 30, $token = null)
    {
        $options          = ['length' => $length];
        $availableOptions = ['length'];

        return $this->sendRequest('POST', 'channels/'.$channel.'/commercial', $this->getToken($token), $options, $availableOptions);
    }
}
