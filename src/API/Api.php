<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Zarlach\TwitchApi\Exceptions\RequestRequiresAuthenticationException;
use Zarlach\TwitchApi\Exceptions\RequestRequiresClientIdException;

class Api
{
    /**
     * @var token
     */
    protected $token;

    /**
     * @var clientId
     */
    protected $clientId;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Construction
     *
     * @param string $clientId Twitch client id
     * @param string $token Twitch OAuth Token
     */
    public function __construct($clientId = null, $token = null)
    {

        // Set clientId if given else get from config
        if ($clientId) {
            $this->setClientId($clientId);
        } elseif (config('twitch-api.client_id')) {
            $this->setClientId(config('twitch-api.client_id'));
        }

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
     * Set clientId
     *
     * @param string $clientId Twitch client id
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Get clientId
     *
     * @param string clientId optional
     * @return string clientId
     */
    public function getClientId($clientId = null)
    {

        // Return given parameter
        if ($clientId) {
            return $clientId;
        }

        // If clientId is null and no clientId has previously been set
        if (!$this->clientId) {
            throw new RequestRequiresClientIdException();
        }

        // Return clientId that has previously been set
        return $this->clientId;
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
     * Get Twitch token
     *
     * @param  string $token Twitch token
     * @return string        Twitch token
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
     * Send request to Twitch API
     *
     * @param  string  $type             Request type
     * @param  string  $path             Request URL path
     * @param  boolean $token            Twitch token
     * @param  array   $options          URL queries
     * @param  array   $availableOptions Available URL queries
     *
     * @return JSON                      JSON object from Twitch
     */
    public function sendRequest($type = 'GET', $path = '', $token = false, $options = [], $availableOptions = [])
    {

        // GET parameters
        $path = ($type == 'GET') ? $this->generateUrl($path, $options, $availableOptions) : $path;

        // Get the Client-ID
        $defaultHeaders = ['Client-ID' => $this->getClientId()];

        // Request object
        $request = new Request($type, $path, $defaultHeaders);

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
