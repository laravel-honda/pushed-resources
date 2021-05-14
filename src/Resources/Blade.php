<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;

class Blade extends PushedResource
{
    protected array $injectedVariables = [];

    public function inject(string $name, mixed $value = null): self
    {
        $this->injectedVariables[$name] = $value;

        return $this;
    }

    public function render(): string
    {
        return __renderBlade(
            $this->getValue(),
            array_merge($this->injectedVariables, ['attributes' => $this->getAttributes()])
        ) ?: '';
    }
}
