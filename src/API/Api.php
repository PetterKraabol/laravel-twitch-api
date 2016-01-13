<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
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

        // Set token if given
        if ($token) {
            $this->setToken($token);
        }

        // GuzzleHttp Client with default parameters.
        $this->client = new Client([
            'base_uri' => 'https://api.twitch.tv/kraken/',
            'defaults' => [
                'headers' => [
                    'Accept' => 'application/vnd.twitchtv.v3+json'
                ]
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

        // If given parameter is not null, return this parameter
        if ($token) {
            return $token;
        }

        // If token is null and no token has previously been set
        if (!$this->token) {
            throw new RequestRequiresAuthenticationException();
        }

        // Return token that has previously been set
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
        // GET parameters
        $path = ($type == 'GET') ? $this->generateUrl($path, $options, $availableOptions) : $path;

        // Request object
        $request = new Request($type, $path);

        // Data for sending
        $data = $this->generateData($token, $options, $availableOptions);

        // Send request with data and get a response
        $response = $this->client->send($request, $data);

        // Return body in JSON data
        return json_decode($response->getBody(), true);
    }

    /**
     * Generate URL with queries
     * @param  String $url              Original URL
     * @param  Array $options           Parameter values
     * @param  Array $availableOptions  Parameters
     * @return String                   URL with queries
     */
    public function generateUrl($url, $options, $availableOptions)
    {

        // Append parameters to url
        foreach ($availableOptions as $parameter) {
            if (isset($options[$parameter])) {
                $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?').$parameter.'='.$options[$parameter];
            }
        }

        return $url;
    }

    /**
     * Generate Send Data
     *
     * @param  String $token Twitch OAuth Token
     * @return Array
     */
    public function generateData($token = false, $options = [], $availableOptions = [])
    {

        // Data types
        $data = [];
        $data['headers'] = $token ? ['Authorization' => 'OAuth '.$token] : null;
        $data['json']    = isset($options['json']) ? $options['json'] : null;

        return $data;
    }
}
