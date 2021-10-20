<?php

namespace Iutrace\Validation;

use Illuminate\Support\ServiceProvider;

class CuitValidatorProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/iutrace'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'iutrace');
    }
}
