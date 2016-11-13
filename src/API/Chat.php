<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/chat.md.
 */
class Chat extends Api
{
    /**
     * Returns a links object to all other chat endpoints.
     *
     * @param string $channel Channel name
     *
     * @return JSON List of endpoints
     */
    public function chat($channel)
    {
        return $this->sendRequest('GET', 'chat/'.$channel);
    }

    /**
     * Get chat badges for channel.
     *
     * @param string $channel Channel name
     *
     * @return JSON Chat badges
     */
    public function chatBadges($channel)
    {
        return $this->sendRequest('GET', 'chat/'.$channel.'/badges');
    }

    /**
     * Get list of every emoticon object.
     *
     * @return JSON List of emoticons
     */
    public function chatEmoticons()
    {
        return $this->sendRequest('GET', 'chat/emotes');
    }
}
