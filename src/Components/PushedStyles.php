<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;

class PushedStyles extends Component
{
    public function render()
    {
        return app('view')->make('assets::pushed-styles');
    }
}
