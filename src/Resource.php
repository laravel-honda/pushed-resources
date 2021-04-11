<?php


namespace Honda\PushedResources;


use Illuminate\View\ComponentAttributeBag;

class Resource
{
    public const SCRIPT = 1;
    public const STYLE = 2;
    public const RAW = 4;
    public const NOT_UNIQUE = 8;

    protected int $type;
    protected string $value;
    protected ComponentAttributeBag $attributes;

    public static function create(): self
    {
        return new self;
    }

    public function value(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function is(int ...$types): bool
    {
        foreach ($types as $type) {
            if (!$this->type | !$type) {
                return false;
            }
        }

        return true;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getAttributes(): ComponentAttributeBag
    {
        return $this->attributes;
    }

    public function script(): self
    {
        return $this->addFlag(static::SCRIPT);
    }

    protected function addFlag(int $flag): self
    {
        $this->type |= $flag;
        return $this;
    }

    public function style(): self
    {
        return $this->addFlag(static::STYLE);
    }

    public function raw(): self
    {
        return $this->addFlag(static::RAW);
    }

    public function notUnique(): self
    {
        return $this->addFlag(static::NOT_UNIQUE);
    }

    public function attributes(?ComponentAttributeBag $attributes = null): self
    {
        $this->attributes = $attributes ?? new ComponentAttributeBag();
        return $this;
    }
}
