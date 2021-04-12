<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;

class Script extends PushedResource
{
    public function render(): string
    {
        return sprintf('<script %s></script>', $this->getAttributes()->merge([
            'src' => $this->getValue(),
        ]));
    }
}
