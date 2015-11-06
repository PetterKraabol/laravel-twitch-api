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
        $blocks = new Blocks($this->getToken($token));
        return $blocks->blocks($user);
    }

    public function putBlock($user, $target, $token = null)
    {
        $blocks = new Blocks($this->getToken($token));
        return $blocks->putBlock($user, $target);
    }

    public function deleteBlock($user, $target, $token = null)
    {
        $blocks = new Blocks($this->getToken($token));
        return $blocks->deleteBlock($user, $target);
    }

    /**
     * Channels
     */
    public function channel($channel)
    {
        $channels = new Channels();
        return $channels->channel($channel);
    }

    public function authenticatedChannel($token = null)
    {
        $channels = new Channels($this->getToken($token));
        return $channels->authenticatedChannel();
    }

    public function putChannel($channel, $options, $token = null)
    {
        $channels = new Channels($this->getToken($token));
        return $channels->putChannel($channel, $options);
    }

    public function deleteStreamKey($channel, $token = null)
    {
        $channels = new Channels($this->getToken($token));
        return $channels->deleteStreamKey($channel);
    }

    public function postCommercial($channel, $length = 30, $token = null)
    {
        $channels = new Channels($this->getToken($token));
        return $channels->postCommercial($channel, $length);
    }

    /**
     * Chat
     */
    public function chatChannel($channel)
    {
        $chat = new Chat();
        return $chat->chatChannel($channel);
    }

    public function chatBadges($channel)
    {
        $chat = new Chat();
        return $chat->chatBadges($channel);
    }

    public function chatEmoticons()
    {
        $chat = new Chat();
        return $chat->chatEmoticons();
    }

    /**
     * Follow
     */
    public function channelFollows($channel, $options = [])
    {
        $follow = new Follow();
        return $follow->channelFollows($channel, $options);
    }

    public function userFollowsChannels($user, $options)
    {
        $follow = new Follow();
        return $follow->userFollowsChannels($user, $options);
    }

    public function userFollowsChannel($user, $channel)
    {
        $follow = new Follow();
        return $follow->userFollowsChannel($user, $channel);
    }

    public function authenticatedUserFollowsChannel($user, $channel, $options = [], $token = null)
    {
        $follow = new Follow($this->getToken($token));
        return $follow->authenticatedUserFollowsChannel($user, $channel, $options);
    }

    public function authenticatedUserUnfollowsChannel($user, $channel, $token = null)
    {
        $follow = new Follow($this->getToken($token));
        return $follow->authenticatedUserUnfollowsChannel($user, $channel);
    }

    /**
     * Games
     */
    public function topGames($options = [])
    {
        $games = new Games();
        return $games->topGames($options);
    }

    /**
     * Ingests
     */
    public function ingests($options = [])
    {
        $ingests = new Ingests();
        return $ingests->ingests($options);
    }

    /**
     * Root
     */
    public function root()
    {
        $root = new Root();
        return $root->root();
    }

    /**
     * Search
     */
    public function searchChannels($options)
    {
        $search = new Search();
        return $search->searchChannels($options);
    }

    public function searchStreams($options)
    {
        $search = new Search();
        return $search->searchStreams($options);
    }

    public function searchGames($options)
    {
        $search = new Search();
        return $search->searchGames($options);
    }

    /**
     * Streams
     */
    public function streamsChannel($channel)
    {
        $streams = new Streams();
        return $streams->streamsChannel($channel);
    }

    public function streams($options)
    {
        $streams = new Streams();
        return $streams->streams($options);
    }

    public function streamsFeatured($options = [])
    {
        $streams = new Streams();
        return $streams->streamsFeatured($options);
    }

    public function streamsSummary($options = [])
    {
        $streams = new Streams();
        return $streams->streamsSummary($options);
    }

    /**
     * Subscriptions
     */
    public function channelsSubscriptions($channel, $options = [], $token = null)
    {
        $subscriptions = new Subscriptions($this->getToken($token));
        return $subscriptions->channelsSubscriptions($channel, $options);
    }

    public function channelSubscriptionsUser($channel, $user, $token = null)
    {
        $subscriptions = new Subscriptions($this->getToken($token));
        return $subscriptions->channelSubscriptionUser($channel, $user);
    }

    public function userSubscriptionChannel($user, $channel, $token = null)
    {
        $subscriptions = new Subscriptions($this->getToken($token));
        return $subscriptions->userSubscriptionChannel($user, $channel);
    }

    /**
     * Teams
     */
    public function teams()
    {
        $teams = new Teams();
        return $teams->teams();
    }

    public function team($team)
    {
        $teams = new Teams();
        return $teams->team($team);
    }

    /**
     * Users
     */
    public function user($user)
    {
        $users = new Users();
        return $users->user($user);
    }

    public function authenticatedUser($token = null)
    {
        $users = new Users($this->getToken($token));
        return $users->authenticatedUser();
    }

    public function streamsFollowed($token = null)
    {
        $users = new Users($this->getToken($token));
        return $users->streamsFollowed();
    }

    public function videosFollowed($token = null)
    {
        $users = new Users($this->getToken($token));
        return $users->videosFollowed();
    }

    /**
     * Videos
     */
    public function video($id)
    {
        $videos = new Videos();
        return $videos->video($id);
    }

    public function videosTop($options = [])
    {
        $videos = new Videos();
        return $videos->videosTop($options);
    }

    public function channelsVideo($channel, $options = [])
    {
        $videos = new Videos();
        return $videos->channelsVideo($channel, $options);
    }
}