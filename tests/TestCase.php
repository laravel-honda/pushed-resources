<?php

namespace Honda\PushedResources\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Honda\PushedResources\PushedResourcesServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            PushedResourcesServiceProvider::class,
        ];
    }
}
