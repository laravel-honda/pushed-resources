<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\PushedResources;
use Honda\PushedResources\Resource;
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

    public function push(Resource $resource): PushedResources
    {
        return app('pushed-resources')->push($resource);
    }
}
