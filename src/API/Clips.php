<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/v3_resources/xxx.md.
 */
class Clips extends Api
{
    /**
     * Get clip object.
     *
     * @param string $slug Clip ID, example: HelloMom
     *
     * @return JSON Clip object
     */
    public function clip($slug)
    {
        return $this->sendRequest('GET', 'clips/'.$slug);
    }

    /**
     *  Get top clips by number of views.
     *
     * @param array $options Video list options
     *
     * @return JSON List of videos
     */
    public function clipsTop($options = [])
    {
        $availableOptions = ['limit', 'offset', 'game', 'period','limit','trending'];

        return $this->sendRequest('GET', 'clips/top', false, $options, $availableOptions);
    }

}
