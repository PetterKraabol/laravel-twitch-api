# Games

Game top lists.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/games.md)

## Functions

`$options` is an optional parameter.

```php
<?php

// Get list of top games
$options = [
    'limit'  => 10,
    'offset' => 0,
];
topGames($options);
```

## Example Usage

File: `App/Https/Controllers/GamesController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function topGames()
    {
        $options = [
            'limit' => 5,
        ];
        return TwitchApi::topGames($options);
    }
}
```