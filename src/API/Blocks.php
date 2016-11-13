<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/blocks.md.
 */
class Blocks extends Api
{
    /**
     * Get user's block list.
     *
     * @param string $user  Username
     * @param string $token Twitch token
     *
     * @return JSON List of ignored users
     */
    public function blocks($user, $token = null)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/blocks', $this->getToken($token));
    }

    /**
     * Add target to user's block list.
     *
     * @param string $user   Username
     * @param string $target Target's username
     * @param string $token  Twitch token
     *
     * @return JSON Request result
     */
    public function putBlock($user, $target, $token = null)
    {
        return $this->sendRequest('PUT', 'users/'.$user.'/blocks/'.$target, $this->getToken($token));
    }

    /**
     * Delete target from user's block list.
     *
     * @param string $user   Username
     * @param string $target Target's username
     * @param string $token  Twitch token
     *
     * @return JSON Request result
     */
    public function deleteBlock($user, $target, $token = null)
    {
        return $this->sendRequest('DELETE', 'users/'.$user.'/blocks/'.$target, $this->getToken($token));
    }
}
