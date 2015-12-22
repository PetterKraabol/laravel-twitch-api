# Blocks

For seeing blocked (ignored) users and (un)block a user.

## Functions
```$token``` is an optional parameter, but required to be set somewhere.

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

File: ```app/Https/Controllers/IgnoreController.php```

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

        return TwitchToken::ignoreList('zarlach');
    }

    public function ignoreUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::ignore('zarlach', 'kappa');
    }

    public function unignoreUser()
    {
        TwitchApi::unignore('xxxxxxxxxxxxxxxxx');

        return TwitchApi::deleteBlock('zarlach', 'kappa');
    }
}
```
