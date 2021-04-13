<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\Script as ScriptResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;
use Throwable;

class Script extends Component
{
    public ?string $href;

    public function __construct(string $href = null)
    {
        try {
            $href = $href !== null ? (string) mix($href) : $href;
        } catch (Throwable $e) {
        }

        $this->href = $href;
    }

    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            ScriptResource::create()
                ->value($this->href)
                ->attributes($attributes)
        );
    }
}
