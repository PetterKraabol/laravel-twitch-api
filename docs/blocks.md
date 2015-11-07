# Blocks

For seeing blocked (ignored) users and (un)block a user.

## Functions
```$token``` is an optional parameter, but required to be set somewhere.

```php
<?php

// List of blocked users
blocks($user, $token);

// Block a user
putBlock($user, $target, $token);

// Unblock user
deleteBlock($user, $target, $token);

```

## Example Usage

File: ```app/Https/Controllers/IgnoreController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IgnoreController extends Controller
{
    public function ignoreList()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchToken::blocks('zarlach', $token);
    }

    public function ignoreUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::putBlock('zarlach', 'kappa', $token);
    }

    public function unignoreUser()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxxxxx');

        return TwitchApi::deleteBlock('zarlach', 'kappa', $token);
    }
}
```
