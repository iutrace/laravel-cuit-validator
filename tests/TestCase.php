<?php

namespace Iutrace\Validation\Tests;

use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Iutrace\Validation\CuitValidatorProvider;
use Orchestra\Testbench\TestCase as OrchestraTest;

class TestCase extends OrchestraTest
{
    protected function getApplicationProviders($app)
    {
        return [
            ValidationServiceProvider::class,
            TranslationServiceProvider::class,
            FilesystemServiceProvider::class,
            CuitValidatorProvider::class,
        ];
    }
}
