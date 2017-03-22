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
     * Authentication.
     */
    public function getAuthenticationUrl($state = null, $forceVerify = false)
    {
        $authentication = new Authentication();

        return $authentication->getAuthenticationUrl($state, $forceVerify);
    }

    public function getAccessToken($code, $state = null)
    {
        $authentication = new Authentication();

        return $authentication->getAccessToken($code, $state);
    }

    public function getAccessObject($code, $state = null)
    {
        $authentication = new Authentication();

        return $authentication->getAccessObject($code, $state);
    }

    /**
     * Blocks.
     */
    public function ignoreList($user, $token = null)
    {
        $blocks = new Blocks($this->getToken($token));

        return $blocks->blocks($user);
    }

    public function ignore($user, $target, $token = null)
    {
        $blocks = new Blocks($this->getToken($token));

        return $blocks->putBlock($user, $target);
    }

    public function unignore($user, $target, $token = null)
    {
        $blocks = new Blocks($this->getToken($token));

        return $blocks->deleteBlock($user, $target);
    }

    /**
     * Channels.
     */
    public function channel($channel)
    {
        $channels = new Channels();

        return $channels->channel($channel);
    }

    public function authChannel($token = null)
    {
        $channels = new Channels($this->getToken($token));

        return $channels->authenticatedChannel();
    }

    public function updateChannel($channel, $options, $token = null)
    {
        $channels = new Channels($this->getToken($token));

        return $channels->putChannel($channel, $options);
    }

    public function resetStreamKey($channel, $token = null)
    {
        $channels = new Channels($this->getToken($token));

        return $channels->deleteStreamKey($channel);
    }

    public function runCommercial($channel, $length = 30, $token = null)
    {
        $channels = new Channels($this->getToken($token));

        return $channels->postCommercial($channel, $length);
    }

    /**
     * Chat.
     */
    public function chat($channel)
    {
        $chat = new Chat();

        return $chat->chatChannel($channel);
    }

    public function chatBadges($channel)
    {
        $chat = new Chat();

        return $chat->chatBadges($channel);
    }

    public function chatEmoticons($channel)
    {
        $chat = new Chat($channel);

        return $chat->chatEmoticons($channel);
    }

    /**
     * Follow.
     */
    public function followers($channel, $options = [])
    {
        $follow = new Follow();

        return $follow->channelFollows($channel, $options);
    }

    public function followings($user, $options)
    {
        $follow = new Follow();

        return $follow->userFollowsChannels($user, $options);
    }

    public function userIsFollowing($user, $channel)
    {
        $follow = new Follow();

        return $follow->userFollowsChannel($user, $channel);
    }

    public function follow($user, $channel, $options = [], $token = null)
    {
        $follow = new Follow($this->getToken($token));

        return $follow->authenticatedUserFollowsChannel($user, $channel, $options);
    }

    public function unfollow($user, $channel, $token = null)
    {
        $follow = new Follow($this->getToken($token));

        return $follow->authenticatedUserUnfollowsChannel($user, $channel);
    }

    /**
     * Games.
     */
    public function topGames($options = [])
    {
        $games = new Games();

        return $games->topGames($options);
    }

    /**
     * Ingests.
     */
    public function ingests($options = [])
    {
        $ingests = new Ingests();

        return $ingests->ingests($options);
    }

    /**
     * Root.
     */
    public function root()
    {
        $root = new Root();

        return $root->root();
    }

    public function authRoot($token = null)
    {
        $root = new Root($this->getToken($token));

        return $root->authRoot();
    }

    /**
     * Search.
     */
    public function searchChannels($options)
    {
        $search = new Search();

        return $search->searchChannels($options);
    }

    /* Coming Soon, use streams() for now

    public function searchStreams($options)
    {
        $search = new Search();
        return $search->searchStreams($options);
    }*/

    /* Coming Soon

    public function searchGames($options)
    {
        $search = new Search();
        return $search->searchGames($options);
    }*/

    /**
     * Streams.
     */
    public function liveChannel($channel)
    {
        $streams = new Streams();

        return $streams->streamsChannel($channel);
    }

    public function streams($options)
    {
        $streams = new Streams();

        return $streams->streams($options);
    }

    public function featuredStreams($options = [])
    {
        $streams = new Streams();

        return $streams->streamsFeatured($options);
    }

    public function streamSummaries($options = [])
    {
        $streams = new Streams();

        return $streams->streamSummaries($options);
    }

    /**
     * Subscriptions.
     */
    public function subscribers($channel, $options = [], $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->channelsSubscriptions($channel, $options, $this->getToken($token));
    }

    public function subscriber($channel, $user, $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->channelSubscriptionUser($channel, $user, $this->getToken($token));
    }

    public function subscribedToChannel($channel, $user, $token = null)
    {
        $subscriptions = new Subscriptions();

        return $subscriptions->userSubscriptionChannel($channel, $user, $this->getToken($token));
    }

    /**
     * Teams.
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
     * Users.
     */
    public function user($user)
    {
        $users = new Users();

        return $users->user($user);
    }

    public function users($options)
    {
        $users = new Users();

        return $users->users($options);
    }

    public function authUser($token = null)
    {
        $users = new Users();

        return $users->authenticatedUser($this->getToken($token));
    }

    public function followedChannelVideos($token = null)
    {
        $users = new Users();

        return $users->followedChannelVideos($this->getToken($token));
    }

    /**
     * Videos.
     */
    public function video($id)
    {
        $videos = new Videos();

        return $videos->video($id);
    }

    public function topVideos($options = [])
    {
        $videos = new Videos();

        return $videos->videosTop($options);
    }

    public function channelVideos($channel, $options = [])
    {
        $videos = new Videos();

        return $videos->channelVideos($channel, $options);
    }
}
