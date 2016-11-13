# Follow

Follower lists, follow and unfollow.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/follows.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

`$options` is an optional parameter.

```php
<?php

// List of followers
$options = [
    'limit'     => 20,
    'offset'    => 0,
    'direction' => 'DESC',
];
followers($channel, $options);

// Get list of who the user is following
$options = [
    'limit'     => 20,
    'offset'    => 0,
    'direction' => 'DESC',
    'sortby'    => 'created_at',
];
followings($user, $options);

// Check if user follows a channel - 404 if not
userIsFollowing($user, $channel);

// Follow a channel
$options = [
    'notifications' => false,
];
follow($user, $channel, $options, $token);

// Unfollow a channel
unfollow($user, $channel, $token);
```

## Example Usage

File: `App/Https/Controllers/FollowController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function followList()
    {
        $options = [
            'limit' => 100,
        ];
        return TwitchApi::followers('zarlach', $options);
    }

    public function followChannel()
    {
        return TwitchApi::follow('zarlach', 'kappa');
    }
}
```