<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\Resource;

class RawScript extends Resource
{
    public function render(): string
    {
        return sprintf('<script %s>%s</script>', $this->attributes, $this->value);
    }
}
