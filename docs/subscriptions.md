# Subscriptions

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/subscribers.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

`$options` is an optional parameter.

```php
<?php

// Get a list of channel subscribers
$options = [
    'limit' => 20,
    'offset' => 0,
    'direction' => 'DESC',
];
subscribers($channel, $options, $token);

// Get subscription object of a single channel subscribers
subscriber($channel, $user, $token);

// Get channel object of a single channel subscriber
subscribedToChannel($channel, $user, $token);
```

## Example Usage

File: `App/Https/Controllers/SubscriptionController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function subscriberList()
    {
        $options = [
            'limit' => 100,
        ];

        TwitchApi::setToken('xxxxxxxxxxxxxx');

        return TwitchApi::subscribers($channel, $options);
    }
}
```