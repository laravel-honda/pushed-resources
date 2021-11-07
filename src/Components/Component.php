<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\PushedResource;
use Honda\PushedResources\PushedResources;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component as BladeComponent;
use Illuminate\View\ComponentAttributeBag;

abstract class Component extends BladeComponent
{
    public function render(): callable
    {
        return function ($componentData) {
            $this->registerResource($componentData['attributes'], $componentData['slot']);
        };
    }

    abstract public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void;

    public function push(PushedResource $resource): PushedResources
    {
        /* @phpstan-ignore-next-line  */
        return app('pushed-resources')->push($resource);
    }
}
