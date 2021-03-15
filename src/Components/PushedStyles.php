<?php

namespace Honda\PushedResources\Components;

use Illuminate\View\Component;


class PushedStyles extends Component
{
    public function render()
    {
        return view('assets::pushed-styles');
    }
}
