<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\Blade as BladeResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

class Blade extends Component
{
    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            BladeResource::create()
                ->value($slot)
                ->attributes($attributes)
        );
    }
}
