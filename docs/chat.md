# Chat

Get chat objects, emotes and badges.

## Functions

```php
<?php

// List of all Twitch emote objects in a channel
chatChannel($channel);

// List of chat badges in a channel
chatBadges($channel);

// Returns list of all Twitch emotes
chatEmoticons();

```

## Example Usage

File: ```App/Https/Controllers/ChatController.php```

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
