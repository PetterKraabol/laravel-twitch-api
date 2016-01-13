<?php

namespace Zarlach\TwitchApi\API;

class Follow extends Api
{
    // List of followers
    public function channelFollows($channel, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'direction'];

        return $this->sendRequest('GET', 'channels/'.$channel.'/follows', false, $options, $availableOptions);
    }

    // Get list of who the user is following
    public function userFollowsChannels($user, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'direction', 'sortby'];

        return $this->sendRequest('GET', 'users/'.$user.'/follows/channels', false, $options, $availableOptions);
    }

    // Check if user follows a channel - 404 if not
    public function userFollowsChannel($user, $channel)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/follows/channels/'.$channel);
    }

    /**
     * TODO:
     * Return true/false when following and unfollowing.
     */

    // Follow a channel
    public function authenticatedUserFollowsChannel($user, $channel, $options = [], $token = null)
    {
        $availableOptions = ['notifications'];

        return $this->sendRequest('PUT', 'users/'.$user.'/follows/channels/'.$channel, $this->getToken($token), $options, $availableOptions);
    }

    // Unfollow a channel
    public function authenticatedUserUnfollowsChannel($user, $channel, $token = null)
    {
        return $this->sendRequest('DELETE', 'users/'.$user.'/follows/channels/'.$channel, $this->getToken($token));
    }
}
