<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/authentication.md
 */

class Authentication extends Api
{

    /**
     * Get the Twitch OAuth url where the user signs in through Twitch
     * @param  string  $state       Will be appended to the redirect_uri to help avoid cross-stire scripting.
     * @param  boolean $forceVerify Prompt user to confirm authorization, allowing users to switch accounts.
     * @return string               Authentication url
     */
    public function getAuthenticationUrl($state = null, $forceVerify = false)
    {
        return 'https://api.twitch.tv/kraken/oauth2/authorize?response_type=code'
        .'&client_id='.config('twitch-api.client_id')
        .'&redirect_uri='.config('twitch-api.redirect_url')
        .'&scope='.join(config('twitch-api.scopes'), '+')
        .'&state='.$state
        .'&force_verify='.$forceVerify;
    }

    /**
     * Get access token based on a code/state retrieved from Twitch after the user has signed in through Twitch
     * @param  string $code code returned from Twitch when user has signed in with their Twitch account
     * @return JSON         JSON response object containing the access token
     */
    public function getAccessToken($code, $state = null)
    {
        $availableOptions = ['client_secret', 'grant_type', 'state', 'code', 'redirect_uri'];

        $options = [
            'client_secret' => config('twitch-api.client_secret'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'state' => $state,
            'redirect_uri' => config('twitch-api.redirect_url')
        ];

        return $this->sendRequest('POST', 'oauth2/token', false, $options, $availableOptions)['access_token'];
    }
}
