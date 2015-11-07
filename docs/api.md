# Api

The Api class contains the core functions of the package. Every other API function extends from this.

## Functions

```php
<?php

// Set token
setToken($token);

// Get token
$token = getToken();
```

## Example Usage

File: ```app/Https/Controllers/TokenController.php```

Return channel object based on an OAuth token.

```php
<?php

namespace App\Http\Controllers;

use TwitchApi;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function setToken()
    {
        TwitchApi::setToken('xxxxxxxxxxxxxx');
    }

    public function getToken()
    {
        return TwitchApi::getToken();
    }
}
```
