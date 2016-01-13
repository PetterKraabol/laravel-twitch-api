<?php

namespace Zarlach\TwitchApi\API;

class Blocks extends Api
{
    // Get blocked users
    public function blocks($user, $token = null)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/blocks', $this->getToken($token));
    }

    // Block a user
    public function putBlock($user, $target, $token = null)
    {
        return $this->sendRequest('PUT', 'users/'.$user.'/blocks/'.$target, $this->getToken($token));
    }

    // Unblock a user
    public function deleteBlock($user, $target, $token = null)
    {
        return $this->sendRequest('DELETE', 'users/'.$user.'/blocks/'.$target, $this->getToken($token));
    }
}
