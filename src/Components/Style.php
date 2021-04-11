<?php

namespace Honda\PushedResources\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;
use Throwable;

class Style extends Component
{
    public ?string $href;

    public function __construct(string $href = null)
    {
        try {
            $href = $href !== null ? (string)mix($href) : $href;
        } catch (Throwable $e) {
        }

        $this->href = $href;
    }

    public function render(): View
    {
        return app('view')->make('assets::style');
    }
}
