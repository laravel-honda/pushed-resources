<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\Resource;

class RawStyle extends Resource
{
    public function render(): string
    {
        return sprintf('<style %s> %s</style>', $this->attributes, $this->value);
    }
}
