<?php

namespace Zarlach\TwitchApi\API;

class Subscriptions extends Api
{
    // Get a list of channel subscribers
    public function channelsSubscriptions($channel, $options = [], $token = null)
    {
        $availableOptions = ['limit', 'offset', 'direction'];

        return $this->sendRequest('GET', 'channels/'.$channel.'subscriptions', $this->getToken($token), $options, $availableOptions);
    }

    // Get subscription object of a single channel subscriber
    public function channelSubscriptionUser($channel, $user, $token = null)
    {
        return $this->sendRequest('GET', 'channels/'.$channel.'/subscriptions/'.$user, $this->getToken($token));
    }

    // Get channel object of a single channel subscriber
    public function userSubscriptionChannel($user, $channel, $token = null)
    {
        return $this->sendRequest('GET', 'users/'.$user.'/subscriptions'.$channel, $this->getToken($token));
    }
}