<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\RawStyle as RawStyleResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

class RawStyle extends Component
{
    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            RawStyleResource::create()
                ->value($slot)
                ->attributes($attributes)
        );
    }
}
