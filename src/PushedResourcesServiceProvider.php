<?php

namespace Honda\PushedResources;

use Illuminate\View\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Starts\Ui\Components\PushedScripts;
use Starts\Ui\Components\PushedStyles;
use Starts\Ui\Components\Style;

class PushedResourcesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        app()->singleton('pushed-resources', function () {
            return new PushedResources;
        });

        $this->loadViewComponentsAs('ui', [
            Style::class,
            PushedScripts::class,
            PushedStyles::class
        ]);

        $package
            ->name('pushed-resources');
    }
}
