<?php

namespace Zarlach\TwitchApi\API;

class Blocks extends Api
{
    // Get blocked users
    public function blocks($user)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/blocks', $this->getToken());
    }

    // Block a user
    public function putBlock($user, $tagret)
    {
        return $this->sendRequest('PUT', 'users/'.$user.'/blocks/'.$target, $this->getToken());
    }

    // Unblock a user
    public function deleteBlock($user, $target)
    {
        return $this->sendRequest('DELETE', 'users/'.$user.'/blocks/'.$target, $this->getToken());
    }
}
