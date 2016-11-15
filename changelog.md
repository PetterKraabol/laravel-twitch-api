# Changelog

## 1.3.5
- Function name fix.

## 1.3.4

- New function `getAccessObject($code, $state = null)` to retrieve full response object when requesting access_token from Twitch. Use this instead of `getAccessToken($code, $state = null)` which is now deprecated.

## 1.3.3

- Twitch tokens can now be set again.
- Fixes to make updating a channel work properly

## 1.3.2

Improved headers and URL parameters.

## 1.3.1

Small authentication function fixes

## 1.3.0

### News

- Use `TwitchApi::getAuthenticationUrl($state, $forceVerify)` to get the redirection url for your users to sign in through Twitch. `$state` and `$forceVerify` are optional, read about them [here](https://github.com/justintv/Twitch-API/blob/master/authentication.md#authorization-code-flow).
- Use `getAccessToken($code)` to retrieve the Twitch token after the user has signed in through Twitch and been redirected back to your application/website.

### Fixes

- `chatBadges($channel)` and `chatEmoticons($channel)` were duplicates.

## 1.2.1

- A client id [is now required](https://blog.twitch.tv/client-id-required-for-kraken-api-calls-afbb8e95f843) for Twitch API calls. Make sure your Twitch client id is set in either `.env` using the `TWITCH_KEY` variable, or directly in `config/twitch-api.php`.

## 1.2.0

- Functions using the $option parameter has been fixed. This had to do with how headers were constructed in HTTP requests to the Twitch API using Guzzle.
- The Twitch API is now using https by default. Replacing http with https is no longer necessary.

## 1.1.0

- Function names are more friendly.

## 1.0.1

- Packagist support

## 1.0.0

- First release