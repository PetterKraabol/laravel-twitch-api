# Documentation

This is a documentation of every function with some code examples that should help you out.

## General info

Some functions has an optional ```$token``` parameter that defaults to *null*. If this is not set, it will look for a token you can set by ```setToken()``` from the Api class: ```TwitchApi::setToken('xxxxxxxxxxxxxx');```. If it does not find any token, an ```RequestRequiresAuthenticationException.php``` exception will be given.

## Twitch API

This package is based on the [justintv/twitch-api](https://github.com/justintv/twitch-api) Twitch API v3. For a more detailed description of objects retrieved from Twitch, visit their repository.

## Dependencies

This package uses [Guzzle 6.1](https://github.com/guzzle/guzzle) to handle requests to Twitch.