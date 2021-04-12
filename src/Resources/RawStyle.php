<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;

class RawStyle extends PushedResource
{
    public function render(): string
    {
        return sprintf('<style %s>%s</style>', $this->getAttributes(), $this->getValue());
    }
}
