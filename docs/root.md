# Root

Twitch API root

## Functions

```php
<?php

// API Root
root();

```

## Example Usage

File: ```app/Https/Controllers/RootController.php```

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RootController extends Controller
{
    public function apiRoot()
    {
        return TwitchToken::root();
    }
}
```
