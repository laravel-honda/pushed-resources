<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;


class PushedScripts extends Component
{
    public function render()
    {
        return view('ui::pushed-scripts');
    }
}
