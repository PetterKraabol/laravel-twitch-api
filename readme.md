# Twitch RESTful API for Laravel

An easy-to-use RESTful API for Laravel 5.2

## Installation

```bash
composer require zarlach/laravel-twitch-api
```

In ```config/app.php```, add this provider in ```providers```

```php
Zarlach\TwitchApi\Providers\TwitchApiServiceProvider::class,
```

Add this facade in ```aliases```

```php
'TwitchApi' => Zarlach\TwitchApi\Facades\TwitchApiServiceFacade::class,
```

Publish config, then configure your ```config/twitch-api.php```

```php
php artisan vendor:publish
```

## Features
 - Easy integration with Laravel
 - SSL for insecure http urls

## Status (what's broken)

Here's a list of known bugs or non-working functions.

*Functions with ```$options``` are currently not working. The commands works fine without this parameter.*

| Function | Description |
| -------- | ----------- |
| Update channel | ```$options``` |
| Reset stream key | ```$length``` ( ```$options``` ) |
| Run commercial | ```$options``` |
| Chat functions | ```$options``` |
| Followers | ```$options``` |
| Followings | ```$options``` |
| Follow | ```$options``` |
| Unfollow | ```$options``` |
| Top games with options | ```$options``` |
| Search channels | ```$options``` |
| Search streams | ```$options``` |
| Search games | ```$options``` |
| Streams with options | ```$options``` |
| Featured Streams with options | ```$options``` |
| Stream summaries | ```$options``` |
| Subscribers with options | ```$options``` |
| Teams with options | ```$options``` |

## Documentation

You'll find documentation markdown files in the ```docs``` folder.
