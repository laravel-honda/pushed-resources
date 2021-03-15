<?php

namespace Honda\PushedResources;

use Honda\PushedResources\Components\PushedScripts;
use Honda\PushedResources\Components\PushedStyles;
use Honda\PushedResources\Components\Script;
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

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'assets');
        $this->loadViewComponentsAs('ui', [
            Style::class,
            Script::class,
            PushedScripts::class,
            PushedStyles::class
        ]);

        $package
            ->name('pushed-resources');
    }
}
