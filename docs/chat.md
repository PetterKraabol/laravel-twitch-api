# Chat

Get chat objects, emotes and badges.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/chat.md)

## Functions

```php
<?php

// List all end points
chatChannel($channel);

// List of chat badges in a channel
chatBadges($channel);

// Returns list of all Twitch emotes
chatEmoticons();
```

## Example Usage

File: `App/Https/Controllers/ChatController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function chat()
    {
        return TwitchApi::chat('zarlach');
    }

    public function chatBadges()
    {
        return TwitchApi::chatBadges('zarlach');
    }

    public function chatEmoticons()
    {
        return TwitchApi::chatEmoticons();
    }
}
```