<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/follows.md.
 */
class Follow extends Api
{
    /**
     * Get channel's list of following users.
     *
     * @param string $channel Channel name
     * @param array  $options List options
     *
     * @return JSON List of followers
     */
    public function channelFollows($channel, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'direction'];

        return $this->sendRequest('GET', 'channels/'.$channel.'/follows', false, $options, $availableOptions);
    }

    /**
     * Get list of who the user is following.
     *
     * @param string $user    Username
     * @param array  $options List options
     *
     * @return JSON List of who the user is following
     */
    public function userFollowsChannels($user, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'direction', 'sortby'];

        return $this->sendRequest('GET', 'users/'.$user.'/follows/channels', false, $options, $availableOptions);
    }

    /**
     * Check if user follows a channel - returns 404 if not.
     *
     * @param string $user    Username
     * @param string $channel Channel name
     *
     * @return JSON Request result
     */
    public function userFollowsChannel($user, $channel)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/follows/channels/'.$channel);
    }

    /**
     * Follow a channel.
     *
     * @param string $user    Username
     * @param string $channel Target channel's name
     * @param array  $options Follow options
     * @param string $token   Twitch token
     *
     * @return JSON Request result
     */
    public function authenticatedUserFollowsChannel($user, $channel, $options = [], $token = null)
    {
        $availableOptions = ['notifications'];

        return $this->sendRequest('PUT', 'users/'.$user.'/follows/channels/'.$channel, $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Unfollow a channel.
     *
     * @param string $user    Username
     * @param string $channel Target channel's name
     * @param string $token   Twitch token
     *
     * @return JSON Response result
     */
    public function authenticatedUserUnfollowsChannel($user, $channel, $token = null)
    {
        return $this->sendRequest('DELETE', 'users/'.$user.'/follows/channels/'.$channel, $this->getToken($token));
    }
}
