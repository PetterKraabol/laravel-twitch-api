# Streams

Twitch streams

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/streams.md)

## Functions

`$options` is an optional parameter.

```php
<?php

// Get stream object if live
liveChannel($channel);

// List of streams, ordered by the number of viewers
$options = [
    'game'      => 'runescape',
    'channel'   => 'zarlach',
    'limit'     => 10,
    'offset'    => 0,
    'client_id' => 'xxxxxxx',
];
streams($options);

// Returns featured/promoted streams
$options = [
    'limit' => 10,
    'offset' => 0,
];
featuredStreams($options);

// Get summary of active streams
$options = [
    'game'   => 'RuneScape',
    'limit'  => 10,
    'offset' => 0,
];
streamSummaries($options);
```

## Example Usage

File: `App/Https/Controllers/StreamsController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class StreamsController extends Controller
{
    public function stream()
    {
        return TwitchApi::liveChannel('zarlach');
    }

    public function streamList()
    {
        $options = [
            'game' => 'RuneScape',
        ];

        return TwitchApi::streams($options);
    }
}
```