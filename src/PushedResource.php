<?php

namespace Honda\PushedResources;

use Illuminate\View\ComponentAttributeBag;

abstract class PushedResource
{
    protected ?string $value                     = null;
    protected ?ComponentAttributeBag $attributes = null;

    public static function create(): self
    {
        return new static();
    }

    public function value(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function attributes(ComponentAttributeBag|array $attributes): self
    {
        if (is_array($attributes)) {
            $attributes = new ComponentAttributeBag($attributes);
        }

        $this->attributes = $attributes;

        return $this;
    }

    abstract public function render(): string;

    public function getValue(): string
    {
        return $this->value ?? '';
    }

    public function getAttributes(): ComponentAttributeBag
    {
        return $this->attributes ?? new ComponentAttributeBag();
    }

    public function hasAttributes(): bool
    {
        return !is_null($this->attributes);
    }

    public function getTag(): string
    {
        return class_basename(static::class);
    }
}
