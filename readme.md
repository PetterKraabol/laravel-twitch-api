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

## Status

| Function | Status |
| -------- | ----------- |
| searchStreams | Coming soon |
| searchGames | Coming soon |

## Documentation

You'll find documentation markdown files in the ```docs``` folder.

## Changelog

A changelog can be found in ```changelog.md```
