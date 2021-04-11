<?php

namespace Honda\PushedResources\Providers;

use Honda\PushedResources\Components\PushedScripts;
use Honda\PushedResources\Components\PushedStyles;
use Honda\PushedResources\Components\Script;
use Honda\PushedResources\Components\Style;
use Honda\PushedResources\PushedResources;
use Illuminate\Support\ServiceProvider;

class PushedResourcesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton('pushed-resources', fn() => new PushedResources());
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'assets');
        $this->loadViewComponentsAs('assets', [
            Style::class,
            Script::class,
            PushedScripts::class,
            PushedStyles::class,
        ]);
    }
}
