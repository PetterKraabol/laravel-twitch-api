# Search

Search for channels

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/search.md)

## Functions

`$options` is an optional parameter.

```php
<?php

// Search channels
$options = [
    'query'  => 'zarlach',
    'limit'  => 5,
    'offset' => 0,
];
searchChannels($options);

// Search channels
$options = [
    'query'  => 'zarlach',
    'limit'  => 5,
    'offset' => 0,
];
searchStreams($options);

// Search channels
$options = [
    'query'  => 'zarlach',
    'limit'  => 5,
    'offset' => 0,
];
searchGames($options);
```

## Example Usage

File: `App/Https/Controllers/SearchController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search()
    {
        $options = [
            'query'  => 'zarlach',
        ];

        return TwitchApi::searchChannels($options);
    }
}
```