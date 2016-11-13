# Root

Twitch API root

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/root.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// API root
root();

// Authenticated API root
authRoot($token);
```

## Example Usage

File: `App/Https/Controllers/RootController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class RootController extends Controller
{
    public function root()
    {
        return TwitchApi::root();
    }

    public function authRoot()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxx');

        return TwitchApi::authRoot();
    }
}
```