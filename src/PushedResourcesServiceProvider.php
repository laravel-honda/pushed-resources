<?php

namespace Honda\PushedResources;

use Honda\PushedResources\Components\PushedScripts;
use Honda\PushedResources\Components\PushedStyles;
use Honda\PushedResources\Components\Style;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PushedResourcesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        app()->singleton('pushed-resources', function () {
            return new PushedResources;
        });

        $package
            ->name('pushed-resources')
            ->hasViewComponents('ui', [
                Style::class,
                PushedScripts::class,
                PushedStyles::class
            ]);
    }
}
