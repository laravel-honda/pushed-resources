<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;

class Resources extends Component
{
    public function render()
    {
        return app('view')->make('assets::pushed-scripts');
    }
}
