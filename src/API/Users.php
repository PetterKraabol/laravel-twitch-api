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

    // An authenticated user is following these channels
    public function streamsFollowed($token = null)
    {
        return $this->sendRequest('GET', 'streams/followed', $this->getToken($token));
    }

    // An authenticated user is following these videos
    public function videosFollowed($token = null)
    {
        return $this->sendRequest('GET', 'videos/followed', $this->getToken($token));
    }
}