# Ingests

Twitch streaming servers.

## Functions

```php
<?php

// Ingest list
ingests();

```

## Example Usage

File: ```app/Https/Controllers/IngestsController.php```

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
