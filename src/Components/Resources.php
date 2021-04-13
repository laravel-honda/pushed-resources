<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;

class Resources extends Component
{
    public string $type;

    public function __construct(string $type = '*')
    {
        $this->type = $type;
    }

    public function render()
    {
        return app('view')->make('assets::resources');
    }
}
