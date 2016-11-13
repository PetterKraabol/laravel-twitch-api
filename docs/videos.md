# Users

Video objects, top lists and channel videos.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/videos.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// Video object
video($id);

// List of videos in a time period, ordered by views
topVideos($options);

// List of channel videos
options = [
    'limit' => 10,
    'offset' => 0,
    'broadcasts' => '',
    'hls' => '',
];
channelVideos($channel, $options);
```

## Example Usage

File: `App/Https/Controllers/VideosController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    public function topList()
    {
        $options = [
            'limit' => 10,
        ];
        return TwitchApi::topVideos($options);
    }
}
```