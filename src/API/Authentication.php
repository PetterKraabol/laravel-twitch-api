<?php

namespace Zarlach\TwitchApi\API;

/**
 * Twitch documentation: https://github.com/justintv/Twitch-API/blob/master/authentication.md.
 */
class Authentication extends Api
{
    /**
     * Get the Twitch OAuth url where the user signs in through Twitch.
     *
     * @param string $state       Will be appended to the redirect_uri to help avoid cross-stire scripting
     * @param bool   $forceVerify Prompt user to confirm authorization, allowing users to switch accounts
     *
     * @return string Authentication url
     */
    public function getAuthenticationUrl($state = null, $forceVerify = false)
    {
        return 'https://api.twitch.tv/kraken/oauth2/authorize?response_type=code'
        .'&client_id='.config('twitch-api.client_id')
        .'&redirect_uri='.config('twitch-api.redirect_url')
        .'&scope='.implode(config('twitch-api.scopes'), '+')
        .'&state='.$state
        .'&force_verify='.$forceVerify;
    }

    /**
     * Get access_token from Twitch.
     *
     * @deprecated Use getAccessObject() instead
     *
     * @param string $code  code from redirect_uri
     * @param string $state optional state OAuth2 parameter to prevent cross-site scripting attacks
     *
     * @return JSON JSON response object containing the access token
     */
    public function getAccessToken($code, $state = null)
    {
        $response = $this->getAccessObject($code, $state);

        return $response['access_token'];
    }

    /**
     * Returns access_token, refresh_token and scope from Twitch.
     *
     * @param string $code  code from redirect_uri
     * @param string $state optional state OAuth2 parameter to prevent cross-site scripting attacks
     *
     * @return JSON JSON response object from Twitch
     */
    public function getAccessObject($code, $state = null)
    {
        $availableOptions = ['client_secret', 'grant_type', 'state', 'code', 'redirect_uri'];

        $options = [
            'client_secret' => config('twitch-api.client_secret'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'state' => $state,
            'redirect_uri' => config('twitch-api.redirect_url'),
        ];

        return $this->sendRequest('POST', 'oauth2/token', false, $options, $availableOptions);
    }
}
