<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;

class Authentication extends Api
{
    /**
     * Generate authentication URL
     *
     * @return String Authentication URL
     */
    public function authenticationURL()
    {
        $clientId    = config('twitch-api.client_id');
        $redirectURL = config('twitch-api.redirect_url');
        $scopes      = implode('+', config('twitch-api.scopes'));

        return config('twitch-api.api_url').'oauth2/authorize?response_type=code&client_id='.$clientId.'&redirect_uri='.$redirectURL.'&scope='.$scopes;
    }

    /**
     * Request Access Token
     *
     * @param  String $code
     * @return String       Access Token
     * @throws Exception
     */
    public function requestToken($code)
    {
        $parameters = [
            'client_id'     => config('twitch-api.client_id'),
            'client_secret' => config('twitch-api.client_secret'),
            'redirect_uri'  => config('twitch-api.redirect_url'),
            'code'          => $code,
            'grant_type'    => 'authorization_code',
        ];

        try {
            $client   = new Client();
            $response = $client->post(config('twitch-api.api_url').'oauth2/token', ['form_params' => $parameters]);
            $response = json_decode($response->getBody(), true);

            if(isset($response['access_token'])) {
                return $response['access_token']
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}