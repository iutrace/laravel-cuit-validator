<?php

namespace Iutrace\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Iutrace\Validation\Rules\Cuil;
use Iutrace\Validation\Rules\Cuit;

class CuitValidatorProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => $this->getLanguagePath(),
        ], 'lang');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'iutrace');

        Validator::extend('cuit', [Cuit::class, 'passes']);
        Validator::replacer('cuit', function ($message, $attribute) {
            return Cuit::replacerMessage($attribute);
        });

        Validator::extend('cuil', [Cuil::class, 'passes']);
        Validator::replacer('cuil', function ($message, $attribute) {
            return Cuil::replacerMessage($attribute);
        });
    }

    /**
     * Get the language path for publishing translations.
     * 
     * @return string
     */
    private function getLanguagePath(): string
    {
        if (method_exists($this->app, 'langPath')) {
            return $this->app->langPath('vendor/iutrace');
        }

        return resource_path('lang/vendor/iutrace');
    }
}
