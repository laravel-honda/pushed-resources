<?php

namespace Honda\PushedResources\Tests;

use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Providers\PushedResourcesServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            PushedResourcesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'PushedResources' => PushedResources::class,
        ];
    }
}
