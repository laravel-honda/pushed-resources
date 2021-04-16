<?php

namespace Honda\PushedResources\Providers;

use Honda\PushedResources\Components\Blade;
use Honda\PushedResources\Components\RawScript;
use Honda\PushedResources\Components\RawStyle;
use Honda\PushedResources\Components\Resources;
use Honda\PushedResources\Components\Script;
use Honda\PushedResources\Components\Style;
use Honda\PushedResources\PushedResources;
use Illuminate\Support\ServiceProvider;

class PushedResourcesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton('pushed-resources', fn () => new PushedResources());
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'assets');
        $this->loadViewComponentsAs('assets', [
            Blade::class,
            Style::class,
            Script::class,
            RawScript::class,
            RawStyle::class,
            Resources::class,
        ]);
    }
}
