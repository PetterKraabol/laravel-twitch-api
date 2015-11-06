# Twitch RESTful API for Laravel

An easy-to-use RESTful API for Laravel 5.1

## Work in Progress

This API is currently in development and is not finished. Documentation, testing and programming is not done. The installation guide below will most likely not work.

## Installation

Add this repository in your ```composer.json```
```json
"repositories": [
  {
      "url": "git@github.com:PetterKraabol/laravel-twitch-api.git",
      "type": "git",
      "reference": "master"
  }
],
```

Then require it

```json
  "zarlach/laravel-twitch-api": "~1.0"
```

In ```config/app.php``` add ```providers```

```php
Zarlach\TwitchApi\Providers\TwitchApiServiceProvider::class,
```

Add aliash in ```aliases```

```php
'TwitchApi' => Zarlach\TwitchApi\Facades\TwitchApiServiceFacade::class,
```

Publish config, then configure your ```config/twitch-api.php```

```php
php artisan vendor:publish --force
```

## To-Do

- Cover every element in Twitch API
- Authentication
- Submit repo to Packagist.org for Composer

## Documentation

### Example Usage

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

### Functions

```$token``` parameter is optional. If not specificed, it will try and get a token you already set.

```php
<?php

// Set token
TwitchApi::setToken($token);

// Get token
$token = TwitchApi::getToken();
```

#### Blocked (ignored) users
```php
<?php

// List of blocked users
TwitchApi::blocks($user, $token);

// Block a user
TwitchApi::putBlock($user, $target, $token);

// Unblock user
TwitchApi::deleteBlock($user, $target, $token);

```

#### Channel
```php
<?php

// Channel
TwitchApi::channel($channel);

// Authenticated channel
TwitchApi::authChannel($token);

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

## Notes

- Twitch API is described in detail in their repository [justintv/Twitch-API](https://github.com/justintv/twitch-api)

- This package uses [guzzle/guzzle](https://github.com/guzzle/guzzle) for HTTP requests.
