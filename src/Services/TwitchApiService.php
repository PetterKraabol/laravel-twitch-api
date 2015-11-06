<?php

namespace Zarlach\TwitchApi\Services;

use Zarlach\TwitchApi\API\Api;
use Zarlach\TwitchApi\API\Authentication;
use Zarlach\TwitchApi\API\Blocks;
use Zarlach\TwitchApi\API\Channels;
use Zarlach\TwitchApi\API\Chat;
use Zarlach\TwitchApi\API\Follow;
use Zarlach\TwitchApi\API\Games;
use Zarlach\TwitchApi\API\Ingests;
use Zarlach\TwitchApi\API\Root;
use Zarlach\TwitchApi\API\Search;
use Zarlach\TwitchApi\API\Streams;
use Zarlach\TwitchApi\API\Subscriptions;
use Zarlach\TwitchApi\API\Teams;
use Zarlach\TwitchApi\API\Users;
use Zarlach\TwitchApi\API\Videos;

class TwitchApiService extends Api
{
    /**
     * Authentication
     */

    /**
     * Blocks
     */
    public function blocks($user, $token = null)
    {
        return new Blocks($this->getToken($token))->blocks($user);
    }

    public function putBlock($user, $target, $token = null)
    {
        return new Blocks($this->getToken($token))->putBlock($user, $target);
    }

    public function deleteBlock($user, $target, $token = null)
    {
        return new Blocks($this->getToken($token))->deleteBlock($user, $target);
    }

    /**
     * Channels
     */
    public function channel($channel)
    {
        return new Channels()->channel($channel);
    }

    public function authenticatedChannel($token = null)
    {
        return new Channels($this->getToken($token))->authenticatedChannel()
    }

    public function putChannel($channel, $options, $token = null)
    {
        return new Channels($this->getToken($token))->putChannel($channel, $options);
    }

    public function deleteStreamKey($channel, $token = null)
    {
        return new Channels($this->getToken($token))->deleteStreamKey($channel);
    }

    public function postCommercial($channel, $length = 30, $token = null)
    {
        return new Channels($this->getToken($token))->postCommercial($channel, $length);
    }

    /**
     * Chat
     */
    public function chatChannel($channel)
    {
        return new Chat()->chatChannel($channel);
    }

    public function chatBadges($channel)
    {
        return new Chat()->chatBadges($channel);
    }

    public function chatEmoticons()
    {
        return new Chat()->chatEmoticons();
    }

    /**
     * Follow
     */
    public function channelFollows($channel, $options = [])
    {
        return new Follow()->channelFollows($channel, $options);
    }

    public function userFollowsChannels($user, $options)
    {
        return new Follow()->userFollowsChannels($user, $options);
    }

    public function userFollowsChannel($user, $channel)
    {
        return new Follow()->userFollowsChannel($user, $channel);
    }

    public function authenticatedUserFollowsChannel($user, $channel, $options = [], $token = null)
    {
        return new Follow($this->getToken($token))->authenticatedUserFollowsChannel($user, $channel, $options);
    }

    public function authenticatedUserUnfollowsChannel($user, $channel, $token = null)
    {
        return new Follow($this->getToken($token))->authenticatedUserUnfollowsChannel($user, $channel)
    }

    /**
     * Games
     */
    public function topGames($options = [])
    {
        return new Games()->topGames($options);
    }

    /**
     * Ingests
     */
    public function ingests($options = [])
    {
        return new Ingests()->ingests($options);
    }

    /**
     * Root
     */
    public function root()
    {
        return new Root()->root();
    }

    /**
     * Search
     */
    public function searchChannels($options)
    {
        return new Search()->searchChannels($options);
    }

    public function searchStreams($options)
    {
        return new Search()->searchStreams($options);
    }

    public function searchGames($options)
    {
        return new Search()->searchGames($options);
    }

    /**
     * Streams
     */
    public function streamsChannel($channel)
    {
        return new Streams()->streamsChannel($channel);
    }

    public function streams($options)
    {
        return new Streams()->streams($options);
    }

    public function streamsFeatured($options = [])
    {
        return new Streams()->streamsFeatured($options);
    }

    public function streamsSummary($options = [])
    {
        return new Streams()->streamsSummary($options);
    }

    /**
     * Subscriptions
     */
    public function channelsSubscriptions($channel, $options = [], $token = null)
    {
        return new Subscriptions($this->getToken($token))->channelsSubscriptions($channel, $options);
    }

    public function channelSubscriptionsUser($channel, $user, $token = null)
    {
        return new Subscriptions($this->getToken($token))->channelSubscriptionUser($channel, $user);
    }

    public function userSubscriptionChannel($user, $channel, $token = null)
    {
        return new Subscriptions($this->getToken($token))->userSubscriptionChannel($user, $channel);
    }

    /**
     * Teams
     */
    public function teams()
    {
        return new Teams()->teams();
    }

    public function team($team)
    {
        return new Teams()->team($team);
    }

    /**
     * Users
     */
    public function user($user)
    {
        return new Users()->user($user);
    }

    public function authenticatedUser($token = null)
    {
        return new Users($this->getToken($token))->authenticatedUser();
    }

    public function streamsFollowed($token = null)
    {
        return new Users($this->getToken($token))->streamsFollowed();
    }

    public function videosFollowed($token = null)
    {
        return new Users($this->getToken($token))_>videosFollowed();
    }

    /**
     * Videos
     */
    public function video($id)
    {
        return new Videos()->video($id);
    }

    public function videosTop($options = [])
    {
        return new Videos()->videosTop($options);
    }

    public function channelsVideo($channel, $options = [])
    {
        return new Videos()->channelsVideo($channel, $options);
    }
}