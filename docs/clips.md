# Users

Clip objects, top lists.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/clips.md)

## Functions

`$token` is an optional parameter, but required to be set somewhere.

```php
<?php

// Clip object
clip($slug);

// List of clips in a time period, ordered by views
topClips($options);


## Example Usage

File: `App/Https/Controllers/VideosController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class ClipsController extends Controller
{
    public function getClip()
    {
		// https://clips.twitch.tv/AgreeableOutstandingChickenStinkyCheese
		$slug = "AgreeableOutstandingChickenStinkyCheese";
		return TwitchApi::clip($slug);
    }
}
```