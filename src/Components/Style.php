<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\Style as StyleResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;
use Throwable;

class Style extends Component
{
    public ?string $href;

    public function __construct(string $href = null)
    {
        try {
            $href = $href !== null ? (string) mix($href) : $href;
        } catch (Throwable) {
        }

        $this->href = $href;
    }

    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            StyleResource::create()
                ->value($this->href)
                ->attributes($attributes)
        );
    }
}
