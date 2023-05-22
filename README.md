# CUIT/CUIL Validator
Argentinian CUIT and CUIL Rules for laravel validation

## Installation

```console
$ composer require defaltuser-24/laravel-cuit-validator:dev-master
```

## Usage

Example of a required and valid CUIT field

```php
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{   
    public function verify(Request $request)
    {
        $data = $request->validate([
            'cuit' => [
                'required|cuit',
            ],
        ]);
        
        return $data['cuit'] . ' is a valid CUIT';
    }
}
```

Example of a required and valid CUIL field

```php
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{   
    public function verify(Request $request)
    {
        $data = $request->validate([
            'cuil' => [
                'required|cuil',
            ],
        ]);
        
        return $data['cuil'] . ' is a valid CUIL';
    }
}
```