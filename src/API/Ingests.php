<?php

namespace Zarlach\TwitchApi\API;

class Ingests extends Api
{
    // Get list of ingest servers
    public function ingests()
    {
        return $this->sendRequest('GET', 'ingests');
    }
}
