# Channels

Channel objects, reset stream keys and play commercials

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/channels.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// Channel
channel($channel);

// Authenticated channel
authChannel($token);

// Update channel
$options = [
    'status' => 'Kappa Stream',
    'game'   => 'RuneScape',
    'delay'  => 0
];
updateChannel($channel, $options, $token);

// Delete (reset) stream key
resetStreamKey($channel, $token);

// Post (run) commercial
runCommercial($channel, $length = 30, $token);
```

## Example Usage

File: `App/Https/Controllers/ChannelController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class ChannelController extends Controller
{
    public function channel()
    {
        return TwitchApi::channel('zarlach');
    }

    public function runCommercial()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxx');

        return TwitchApi::runCommercial('zarlach', 30);
    }
}
```
