# CUIT Validator
Argentinian CUIT Rule for laravel validation

## Installation

```console
$ composer require iutrace/laravel-cuit-validator
```

## Usage

Example of a required and valid CUIT field

```php
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Iutrace\Validation\Rules\Cuit;

class ExampleController extends Controller
{   
    public function verify(Request $request)
    {
        $data = $request->validate([
            'cuit' => [
                'required',
                new Cuit(),
            ],
        ]);
        
        return $data['cuit'] . ' is a valid CUIT';
    }
}
```