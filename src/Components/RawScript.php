<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\RawScript as RawScriptResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

class RawScript extends Component
{
    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            RawScriptResource::create()
                ->value($slot)
                ->attributes($attributes)
        );
    }
}
