<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;
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

    public function render()
    {
        return app('view')->make('assets::script');
    }
}
