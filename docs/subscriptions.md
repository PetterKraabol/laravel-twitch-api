# Subscriptions

## Functions

```$token``` is an optional parameter, but required to be set somewhere.

```$options``` is an optional parameter.

```php
<?php

// Get a list of channel subscribers
$options = [
    'limit' => 20,
    'offset' => 0,
    'direction' => 'DESC',
];
channelsSubscriptions($channel, $options, $token);

// Get subscription object of a single channel subscribers
channelSubscriptionUser($channel, $user, $token);

// Get channel object of a single channel subscriber
userSubscriptionChannel($user, $channel, $token);

```

## Example Usage

File: ```app/Https/Controllers/SubscriptionController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function subscriberList()
    {
        $options = [
            'limit' => 100,
        ];

        TwitchApi::setToken('xxxxxxxxxxxxxx');

        return TwitchApi::channelsSubscriptions($channel, $options);
    }
}
```
