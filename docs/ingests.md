# Ingests

Twitch streaming servers.

[Twitch API](https://github.com/justintv/Twitch-API/blob/master/ingests.md)

## Functions

```php
<?php

// Ingest list
ingests();
```

## Example Usage

File: `App/Https/Controllers/IngestsController.php`

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Controllers\Controller;

class IngestsController extends Controller
{
    public function ingestsList()
    {
        return TwitchApi::ingests();
    }
}
```