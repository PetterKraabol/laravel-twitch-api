<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;
use Zarlach\TwitchApi\Exceptions\RequestRequiresAuthenticationException;

class Api
{
    /**
     * @var token
     */
    protected $token;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Construction
     *
     * @param token $token Twitch OAuth Token
     */
    public function __construct($token = null)
    {
        if($token) $this->setToken($token);
        $this->client = new Client([
            'base_uri' => 'https://api.twitch.tv/kraken/',
            'timeout'  => 2.0,
            'defaults' => [
                'headers' => ['Accept' => 'application/vnd.twitchtv.v3+json']
            ]
        ]);
    }

    /**
     * Set Twitch OAuth Token
     *
     * @param String $token OAuth token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get Twitch OAuth Token
     *
     * @return string Token
     */
    public function getToken($token = null)
    {
        if($token)
            return $token;

        if(!$this->token)
            throw new RequestRequiresAuthenticationException();

        return $this->token;
    }

    /**
     * Authenticated Request
     *
     * @param  string $type  Request Type
     * @param  string $path   Request URL
     * @param  string $token Twitch OAuth Token
     *
     * @return \GuzzleHttp\Message\Request|\GuzzleHttp\Message\RequestInterface
     */
    public function sendRequest($type = 'GET', $path = '', $token = false, $options = [], $availableOptions = [])
    {
        $response = $this->client->request($type, $path, $this->generateHeaders($token, $options, $availableOptions));
        return json_decode($response->getBody(), true);
    }

    public function sendSpecialRequest($type, $path, )
    {

    }

    /**
     * Default Request Headers
     *
     * @param  String $token Twitch OAuth Token
     * @return Array
     */
    public function generateHeaders($token = false, $options = [], $availableOptions = [])
    {
        foreach ($availableOptions as $option) {
            if (isset($options[$option])) {
                $options[$option] = $options[$option];
            }
        }

        $headers['form_params'] = $options;

        if($token)
            $headers['headers'] = ['Authorization' => 'OAuth '.$this->getToken()];

        return $headers;
    }
}