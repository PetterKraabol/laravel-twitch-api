<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/users.md.
 */
class Users extends Api
{
    /**
     * User object.
     *
     * @param string $user Username
     *
     * @return JSON User object
     */
    public function user($user)
    {
        return $this->sendRequest('GET', 'users/'.$user);
    }

    /**
     * Users object
     *
     * @param $options List options
     *
     * @return JSON Users object
     */
    public function users($options)
    {
        $availableOptions = ['login'];

        return $this->sendRequest('GET', 'users', false, $options, $availableOptions);
    }

    /**
     * Authenticated user object.
     *
     * @param string $token Twitch token
     *
     * @return JSON Authenticated user object
     */
    public function authenticatedUser($token = null)
    {
        return $this->sendRequest('GET', 'user', $this->getToken($token));
    }

    /**
     * Followed streams who are live.
     *
     * @param string $token Twitch token
     *
     * @return JSON List of streams
     */
    public function liveChannels($token = null)
    {
        return $this->sendRequest('GET', 'streams/followed', $this->getToken($token));
    }

    /**
     * Videos from channels you follow.
     *
     * @param string $token Twitch token
     *
     * @return JSON List of videos
     */
    public function followedChannelVideos($token = null)
    {
        return $this->sendRequest('GET', 'videos/followed', $this->getToken($token));
    }
}
