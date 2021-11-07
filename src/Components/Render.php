<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;

class Render extends Component
{
    public function __construct(public string $type = '*')
    {
    }

    public function render()
    {
        /* @phpstan-ignore-next-line */
        return app('view')->make('assets::render');
    }
}
