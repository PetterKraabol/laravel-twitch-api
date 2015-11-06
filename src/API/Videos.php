<?php

namespace Zarlach\TwitchApi\API;

class Videos extends Api
{
    // Video object
    public function video($id)
    {
        return $this->sendRequest('GET', 'videos/'.$id);
    }

    // List of videos in a time period, ordered by views
    public function videosTop($options = [])
    {
        $availableOptions = ['limit', 'offset', 'game', 'period'];

        return $this->sendRequest('GET', 'videos/top', false, $options, $availableOptions);
    }

    // List of channel videos
    public function channelsVideo($channel, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'broadcasts', 'hls'];

        return $this->sendRequest('GET', 'channels/'.$channel.'/videos', false, $options, $availableOptions);
    }
}