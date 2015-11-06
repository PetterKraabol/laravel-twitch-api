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
- Testing
- Authentication
- Submit repo to Packagist.org for Composer

## Notes

- Twitch API is described in detail in their repository [justintv/Twitch-API](https://github.com/justintv/twitch-api)

- This package uses [guzzle/guzzle](https://github.com/guzzle/guzzle) for HTTP requests.
