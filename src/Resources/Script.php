<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\Resource;

class Script extends Resource
{
    public function render(): string
    {
        return sprintf('<script %s></script>', $this->attributes->merge([
            'src' => $this->value,
        ]));
    }
}
