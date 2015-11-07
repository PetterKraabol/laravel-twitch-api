# Follow

Follower lists, follow and unfollow.

## Functions

```$token``` is an optional parameter, but required to be set somewhere.

```$options``` is an optional parameter.

```php
<?php

// List of followers
$options = [
    'limit'     => 20,
    'offset'    => 0,
    'direction' => 'DESC',
];
channelFollows($channel, $options);

// Get list of who the user is following
$options = [
    'limit'     => 20,
    'offset'    => 0,
    'direction' => 'DESC',
    'sortby'    => 'created_at',
];
userFollowsChannels($user, $options);

// Check if user follows a channel - 404 if not
userFollowsChannel($user, $channel);

// Follow a channel
$options = [
    'notifications' => false,
];
authenticatedUserFollowsChannel($user, $channel, $options, $token);

// Unfollow a channel
authenticatedUserUnfollowsChannel($user, $channel, $token);

```

## Example Usage

File: ```app/Https/Controllers/FollowController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function followList()
    {
        $options = [
            'limit' => 100,
        ];
        return TwitchToken::channelFollows('zarlach', $options);
    }

    public function followChannel()
    {
        return TwitchApi::authenticatedUserFollowsChannel('zarlach', 'kappa');
    }
}
```
