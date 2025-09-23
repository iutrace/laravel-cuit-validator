<?php

namespace Iutrace\Validation\Tests;

use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Iutrace\Validation\CuitValidatorProvider;
use Orchestra\Testbench\TestCase as OrchestraTest;

class TestCase extends OrchestraTest
{
    protected function getPackageProviders($app): array
    {
        return [
            CacheServiceProvider::class,
            ValidationServiceProvider::class,
            TranslationServiceProvider::class,
            FilesystemServiceProvider::class,
            CuitValidatorProvider::class,
        ];
    }
}
