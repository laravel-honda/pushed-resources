<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;

class Style extends PushedResource
{
    public function render(): string
    {
        return sprintf('<link %s>', $this->getAttributes()->merge([
            'rel'  => 'stylesheet',
            'href' => $this->getValue(),
        ]));
    }
}
