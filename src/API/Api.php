<?php

namespace Zarlach\TwitchApi\API;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

use Zarlach\TwitchApi\Exceptions\RequestRequiresAuthenticationException;
use Zarlach\TwitchApi\Exceptions\RequestRequiresClientIdException;

class Api
{
    /**
     * Twitch token.
     *
     * @var token
     */
    protected $token;

    /**
     * Twitch client id.
     *
     * @var clientId
     */

    protected $clientId;

    /**
     * Guzzle is used to make http requests.
     *
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Construction.
     *
     * @param string $token    Twitch OAuth Token
     * @param string $clientId Twitch client id
     */
    public function __construct($token = null, $clientId = null)
    {

        // Set token if given
        if ($token) {
            $this->setToken($token);
        }

        // Set clientId if given else get from config
        if ($clientId) {
            $this->setClientId($clientId);
        } elseif (config('twitch-api.client_id')) {
            $this->setClientId(config('twitch-api.client_id'));
        } 

        // GuzzleHttp Client with default parameters.
        $this->client = new Client([
            'base_uri' => 'https://api.twitch.tv/kraken/',
            'headers'  => array('Accept' => 'application/vnd.twitchtv.v5+json')
        ]);
    }

    /**
     * Set clientId.
     *
     * @param string $clientId Twitch client id
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Get clientId.
     *
     * @param string clientId optional
     *
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
     * Set Twitch OAuth Token.
     *
     * @param string $token OAuth token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get Twitch token.
     *
     * @param string $token Twitch token
     *
     * @return string Twitch token
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
     * Send request to Twitch API.
     *
     * @param string $type             Request type
     * @param string $path             Request URL path
     * @param bool   $token            Twitch token
     * @param array  $options          URL queries
     * @param array  $availableOptions Available URL queries
     *
     * @return JSON JSON object from Twitch
     */
    public function sendRequest($type = 'GET', $path = '', $token = false, $options = [], $availableOptions = [])
    {

/**
 * TODO: $availableOptions is currently not being used, as it's
 * just a limitation in case Twitch adds to, or makes changes to them.
 * This variable can either be removed completed or used for something
 * more useful, like telling developers what options they have.
 */
        // URL parameters
        //$path = $this->generateUrl($path, $token, $options, $availableOptions);
        $path = $this->generateUrl($path, $token, $options, $availableOptions);

        // Headers
        $data = [
          'headers' => [
            'Client-ID' => $this->getClientId(),
            'Accept' => 'application/vnd.twitchtv.v5+json',
          ],
        ];

        // Twitch token
        if ($token) {
            $data['headers']['Authorization'] = 'OAuth '.$this->getToken($token);
        }

        try{
            // Request object
            $request = new Request($type, $path, $data);
            // Send request
            $response = $this->client->send($request);

            // Return body in JSON data
            return json_decode($response->getBody(), true);
        }
        catch(RequestException $e){
            if ($e->hasResponse()) {
                $exception = (string) $e->getResponse()->getBody();
                $exception = json_decode($exception);
                return $exception;
            } else {
                //503
                return array(
                    'error' => 'Service Unavailable',
                    'status' => 503,
                    'message' => $e->getMessage()
                );
            }
        }
        
    }

    /**
     * Generate URL with queries.
     *
     * @param string $url              Original URL
     * @param array  $options          Parameter values
     * @param array  $availableOptions Parameters
     *
     * @return string URL with queries
     */
    public function generateUrl($url, $token, $options, $availableOptions)
    {

        // Append client id
        $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?').'client_id='.$this->getClientId();

        // Append token if provided
        if ($token) {
            $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?').'oauth_token='.$this->getToken($token);
        }

        // Add options to the URL
        foreach ($options as $key => $value) {
            $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?').$key.'='.$value;
        }

        return $url;
    }
}
