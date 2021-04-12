<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;

class RawScript extends PushedResource
{
    public function render(): string
    {
        return sprintf('<script %s>%s</script>', $this->getAttributes(), $this->getValue());
    }
}
