<?php

namespace Honda\PushedResources\Components;

use Honda\PushedResources\Resources\Script as ScriptResource;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;
use Throwable;

class Script extends Component
{
    public ?string $src;

    public function __construct(string $src = null)
    {
        try {
            $src = $src !== null ? (string) mix($src) : $src;
        } catch (Throwable $e) {
        }

        $this->src = $src;
    }

    public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
    {
        $this->push(
            ScriptResource::create()
                ->value($this->src)
                ->attributes($attributes)
        );
    }
}
