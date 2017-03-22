# Users

User objects, followings and followed videos.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/users.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// User object
user($user);

// Get the users by username
$options = [
    'login' => 'username',
];
users($options)

// Authenticated user object
authUser($token);

// Followed streams who are live
liveChannels($token);

// Videos from channels you follow
followedChannelVideos($token);
```

## Example Usage

File: `App/Https/Controllers/UsersController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function user()
    {
        return TwitchApi::user('zarlach');
    }

    public function users()
    {
        $options = [
            'login' => 'username',
        ];

        return TwitchApi::users($options);
    }

    public function authUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxx');

        return TwitchApi::authUser();
    }
}
```