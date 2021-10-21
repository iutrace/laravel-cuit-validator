<?php

namespace Iutrace\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Iutrace\Validation\Rules\Cuit;

class CuitValidatorProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/iutrace'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'iutrace');

        Validator::extend('cuit', Cuit::class . '@passes');
        Validator::replacer('cuit', function ($message, $attribute) {
            return Cuit::replacerMessage($attribute);
        });
    }
}
