<?php

namespace Honda\PushedResources\Resources;

use Honda\PushedResources\PushedResource;
use Illuminate\View\Factory;

class Blade extends PushedResource
{
    protected array $injectedVariables = [];

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function inject(string $name, $value = null): self
    {
        $this->injectedVariables[$name] = $value;

        return $this;
    }

    public function render(): string
    {
        return __render_blade_do_not_use_or_you_will_get_fired(
            app('blade.compiler')->compileString($this->getValue()),
            array_merge($this->injectedVariables, ['attributes' => $this->getAttributes(), '__env' => app(Factory::class)])
        ) ?: '';
    }
}
