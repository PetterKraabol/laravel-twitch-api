# Streams

Twitch streams

## Functions

```$options``` is an optional parameter.

```php
<?php
// Get stream object if live
streamsChannel($channel);

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
streamsFeatured($options);

// Get summary of active streams
$options = [
    'game'   => 'RuneScape',
    'limit'  => 10,
    'offset' => 0,
];
streamSummary($options);

```

## Example Usage

File: ```app/Https/Controllers/StreamsController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StreamsController extends Controller
{
    public function stream()
    {
        return TwitchToken::streamsChannel('zarlach');
    }

    public function streamList()
    {
        $options = [
            'game' => 'RuneScape',
        ];

        return TwitchTokens::streams($options);
    }
}
```
