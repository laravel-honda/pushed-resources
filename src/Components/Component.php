<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\PushedResource;
use Honda\PushedResources\PushedResources;
use Illuminate\View\Component as BladeComponent;
use Illuminate\View\ComponentAttributeBag;

abstract class Component extends BladeComponent
{
    public function render(): callable
    {
        return function ($componentData) {
            $this->registerResource($componentData['attributes']);
        };
    }

    abstract public function registerResource(ComponentAttributeBag $attributes): void;

    public function push(PushedResource $resource): PushedResources
    {
        return app('pushed-resources')->push($resource);
    }
}
