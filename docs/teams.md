# Teams

Team lists and objects.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/teams.md)

## Functions

`$options` is an optional parameter.

```php
<?php

// List of active streams
$options = [
    'limit' => 20,
    'offset' => 0,
];
teams($options);

// Get team object
team($team);
```

## Example Usage

File: `App/Https/Controllers/TeamController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function teamList()
    {
        return TwitchApi::teams();
    }

    public function team()
    {
        return TwitchApi::team('aoaagold');
    }
}
```