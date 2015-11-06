<?php

namespace Zarlach\TwitchApi\API;

class Chat extends Api
{
    // List of all Twitch emote objects in a channel
    public function chatChannel($channel)
    {
        return $this->sendRequest('GET', 'chat/'.$channel)
    }

    // List of chat badges in a channel
    public function chatBadges($channel)
    {
        return $this->sendRequest('GET', 'chat/'.$channel.'/badges');
    }

    // Returns list of all Twitch emotes
    public function chatEmoticons()
    {
        return $this->sendRequest('GET', 'chat/'.$channel.'badges');
    }
}