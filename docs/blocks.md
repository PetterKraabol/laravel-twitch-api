# Blocks

For seeing blocked (ignored) users and (un)block a user.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/blcoks.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// List of blocked users
ignoreList($user, $token);

// Block a user
ignore($user, $target, $token);

// Unblock user
unignore($user, $target, $token);
```

## Example Usage

File: `App/Https/Controllers/IgnoreController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class IgnoreController extends Controller
{
    public function ignoreList()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::ignoreList('zarlach');
    }

    public function ignoreUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::ignore('zarlach', 'kappa');
    }

    public function unignoreUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::unignore('zarlach', 'kappa');
    }
}
```