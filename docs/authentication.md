# Authentication

If this doesn't cover your needs, take a look at [Socialite Providers](https://socialiteproviders.github.io) and their [Twitch OAuth2 package](http://socialiteproviders.github.io/providers/twitch/).

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/authentication.md)

## Functions

```php
<?php

// Get the Twitch OAuth URL to where the user signs in through Twitch. Both parameters are optional.
// If $forceVerify is set to true, the user will be forced to verify access again.
getAuthenticationUrl($state, $forceVerify);

// Get access_token, refresh_token and scopes by a code from the return uri.
getAccessObject($code, $state = null)

// Same as getAccessObject(), but only returns access_token (deprecated).
getAccessToken($code, $state = null)
```
## Example Usage
File: `App/Https/Controllers/AuthController.php`
```php
<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use TwitchApi;

class AuthController extends Controller
{
    public function redirectToTwitchAuthentication()
    {
        return redirect(TwitchApi::getAuthenticationUrl());
    }

    public function handleTwitchCallback(Request $request)
    {

        // Request Twitch token from Twitch
        $code = $request->input('code');
        $response = TwitchApi::getAccessObject($code);
        TwitchApi::setToken($response['access_token']);

        // Get user object from Twitch
        $twitchUser = Twitch::authUser();

        /**
         * Find or create user (this expects a twitch_id column in your users table).
         *
         * It's recommended to identify Twitch users by twitch_id, rather than by name.
         * Names may be changed by Twitch staff, however, the twitch_id remains the same.
         */
        $user = User::findOrNew(['twitch_id' => $twitchUser['_id']]);

        // Authenticate user
        Auth::login($user);
    }
}
```