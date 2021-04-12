<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\Resource;

class Style extends Resource
{
    public function render(): string
    {
        return sprintf('<link %s />', $this->attributes->merge([
            'rel'  => 'stylesheet',
            'href' => $this->value,
        ]));
    }
}
