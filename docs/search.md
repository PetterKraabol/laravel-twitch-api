# Search

Search for channels

## Functions

```$options``` is an optional parameter.

```php
<?php

// Search channels
$options = [
    'query'  => 'zarlach',
    'limit'  => 5,
    'offset' => 0,
];
searchChannels($options);

```

## Example Usage

File: ```app/Https/Controllers/SearchController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search()
    {
        $options = [
            'query'  => 'zarlach',
        ];

        return TwitchToken::searchChannels($options);
    }
}
```
