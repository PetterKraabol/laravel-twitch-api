<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/subscriptions.md.
 */
class Subscriptions extends Api
{
    /**
     * List of channel subscribers.
     *
     * @param string $channel Channel name
     * @param array  $options Subscriber list options
     * @param string $token   Twitch token
     *
     * @return JSON List of subscribers
     */
    public function channelsSubscriptions($channel, $options = [], $token = null)
    {
        $availableOptions = ['limit', 'offset', 'direction'];

        return $this->sendRequest('GET', 'channels/'.$channel.'/subscriptions', $this->getToken($token), $options, $availableOptions);
    }

    /**
     * Get subscription object of a single channel subscriber.
     *
     * @param string $channel Channel name
     * @param string $user    Username
     * @param string $token   Twitch name
     *
     * @return JSON A channel subscriber
     */
    public function channelSubscriptionUser($channel, $user, $token = null)
    {
        return $this->sendRequest('GET', 'channels/'.$channel.'/subscriptions/'.$user, $this->getToken($token));
    }

    /**
     * Get user object of a single channel subscriber.
     *
     * @param string $channel Channel name
     * @param string $user    Username
     * @param string $token   Twitch token
     *
     * @return JSON User object
     */
    public function userSubscriptionChannel($channel, $user, $token = null)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/subscriptions/'.$channel, $this->getToken($token));
    }
}
