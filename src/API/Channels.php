<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/channels.md.
 */
class Channels extends API
{
    /**
     * Get channel object.
     *
     * @param string $channel Channel name
     *
     * @return JSON Channel object
     */
    public function channel($channel)
    {
        return $this->sendRequest('GET', 'channels/'.$channel);
    }

    /**
     *  Get authenticated channel object.
     *
     * @param string $token Twitch token
     *
     * @return JSON Channel object
     */
    public function authenticatedChannel($token = null)
    {
        return $this->sendRequest('GET', 'channel', $this->getToken($token));
    }

    /**
     * Update channel.
     *
     * @param string $channel Channel name
     * @param array  $options Channel options
     * @param string $token   Twitch token
     *
     * @return JSON Request result
     */
    public function putChannel($channel, $rawOptions, $token = null)
    {
        $options = [];

        foreach ($rawOptions as $key => $value) {
            $options['channel['.$key.']'] = $value;
        }

        return $this->sendRequest('PUT', 'channels/'.$channel, $this->getToken($token), $options);
    }

    /**
     * Reset stream key.
     *
     * @param string $channel Channel name
     * @param string $token   Twitch token
     *
     * @return JSON Request result with new stream key
     */
    public function deleteStreamKey($channel, $token = null)
    {
        return $this->sendRequest('DELETE', 'channels/'.$channel.'/stream_key', $this->getToken($token));
    }

    /**
     * Run commercial.
     *
     * @param string $channel Channel name
     * @param number $length  Commercial length
     * @param string $token   Twitch token
     *
     * @return JSON Request result
     */
    public function postCommercial($channel, $length = 30, $token = null)
    {
        $availableOptions = ['length'];
        $options = ['length' => $length];

        return $this->sendRequest('POST', 'channels/'.$channel.'/commercial', $this->getToken($token), $options, $availableOptions);
    }
}
