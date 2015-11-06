# Documentation

## Example Usage

File: ```app/Https/Controllers/TwitchApiController.php```

Getting channel info

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwitchApiController extends Controller
{
    public function channel()
    {
        return TwitchApi::channel('zarlach');
    }
}
```

## Functions

```$token``` parameter is optional. If not specificed, it will try and get a token you already set.

```php
<?php

// Set token
TwitchApi::setToken($token);

// Get token
$token = TwitchApi::getToken();
```

### Blocked (ignored) users
```php
<?php

// List of blocked users
TwitchApi::blocks($user, $token);

// Block a user
TwitchApi::putBlock($user, $target, $token);

// Unblock user
TwitchApi::deleteBlock($user, $target, $token);

```

### Channel
```php
<?php

// Channel
TwitchApi::channel($channel);

// Authenticated channel
TwitchApi::authenticatedChannel($token);

// Update channel
$options = array(
    'status' => 'Kappa Stream',
    'game'   => 'RuneScape',
    'delay'  => 0
);
TwitchApi::putChannel($channel, $options, $token);

// Delete (rest) stream key
TwitchApi::deleteStreamKey($channel, $token);

// Post (run) commercial
TwitchApi::postCommercial($channel, $length = 30, $tokens);
```
