<?php

namespace Zarlach\TwitchApi\API;

class Users extends Api
{
    // User object
    public function user($user)
    {
        return $this->sendRequest('GET', 'users/'.$user);
    }

    // Authenticated user object
    public function authenticatedUser($token = null)
    {
        return $this->sendRequest('GET', 'user', $this->getToken($token));
    }

    // Followed streams who are live
    public function liveChannels($token = null)
    {
        return $this->sendRequest('GET', 'streams/followed', $this->getToken($token));
    }

    // Videos from channels you follow
    public function followedChannelVideos($token = null)
    {
        return $this->sendRequest('GET', 'videos/followed', $this->getToken($token));
    }
}
