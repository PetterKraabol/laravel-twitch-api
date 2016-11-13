# Api

The Api class contains the core functions of the package. All other API functions extend from this.

## Functions

```php
<?php

// Set token
setToken($token);

// Get token
$token = getToken();

// Set twitch client id
setClientId($clientId);

// Get twitch client id
$clientId = getClientId();
```

## Example Usage

File: `App/Https/Controllers/TokenController.php`

Return channel object based on an OAuth token.

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function setToken()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxx');
    }

    public function getToken()
    {
        return TwitchApi::getToken();
    }
}
```