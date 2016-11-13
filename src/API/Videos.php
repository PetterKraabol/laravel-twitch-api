<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/videos.md.
 */
class Videos extends Api
{
    /**
     * Get video object.
     *
     * @param string $id Video ID, including the prefixed letter, example: c6055863
     *
     * @return JSON Video object
     */
    public function video($id)
    {
        return $this->sendRequest('GET', 'videos/'.$id);
    }

    /**
     *  Get top videos by number of views.
     *
     * @param array $options Video list options
     *
     * @return JSON List of videos
     */
    public function videosTop($options = [])
    {
        $availableOptions = ['limit', 'offset', 'game', 'period'];

        return $this->sendRequest('GET', 'videos/top', false, $options, $availableOptions);
    }

    /**
     * Get list of video objects belonging to channel.
     *
     * @param string $channel Channel name
     * @param array  $options Video list options
     *
     * @return JSON List of videos
     */
    public function channelVideos($channel, $options = [])
    {
        $availableOptions = ['limit', 'offset', 'broadcasts', 'hls'];

        return $this->sendRequest('GET', 'channels/'.$channel.'/videos', false, $options, $availableOptions);
    }
}
