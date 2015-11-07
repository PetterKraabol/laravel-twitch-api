# Twitch RESTful API for Laravel

An easy-to-use RESTful API for Laravel 5.1

## Installation

Add this repository and require the package in your ```composer.json```.
```json
"repositories": [
    {
        "url": "git@github.com:petterkraabol/laravel-twitch-api.git",
        "type": "git",
        "reference": "master"
    }
],
```
```json
"require": {
    "petterkraabol/laravel-twitch-api": "~1.0"
},
```
Update composer

```bash
$ composer update
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
php artisan vendor:publish --force
```

## To-Do
- Authentication
- Submit repo to Packagist.org for Composer

## Documentation

You'll find documentation markdown files in the ```docs``` folder.
