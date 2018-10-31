# social-learning
Using Laravel Captcha in project : 
## Installing Laravel Captcha Composer Package
Note: If you do not have Composer yet, you can install it by following the instructions on https://getcomposer.org
#### Step 1. Install package
```bash
composer require bonecms/laravel-captcha
```
#### Step 2 for Laravel 5.5 and below. Register the Laravel Captcha service provider
{LARAVEL_ROOT}/config/app.php:
```php
'providers' => [
    ...
    Igoshev\Captcha\Providers\CaptchaServiceProvider::class,
],
```

Showing a Captcha in a View:
```html
...
@captcha
<input type="text" id="captcha" name="captcha">
 ...
```
Check user input during form submission:
```php
<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller 
{
    public function getExample() 
    {
        return view('myView');
    }

    public function postExample(Request $request)
    {
    	$this->validate($request, [
            'captcha' => 'required|captcha'
        ]);

        // Validation passed
    }
}
```
### Configuration
```bash
php artisan vendor:publish --provider="Igoshev\Captcha\Providers\CaptchaServiceProvider" --tag="config"


