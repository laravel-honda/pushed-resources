<?php

namespace Honda\PushedResources;

use Honda\PushedResources\Contracts\PushesResources;
use Illuminate\View\ComponentAttributeBag;

class PushedResources implements PushesResources
{
    /** @var Resource[] */
    protected array $resources;

    public function pushScript(string $href, ?ComponentAttributeBag $attributes = null): PushesResources
    {
        $this->resources[] = Resource::create()
            ->script()
            ->value($href)
            ->attributes($attributes);
        return $this;
    }

    public function pushRawScript(string $contents, ?ComponentAttributeBag $attributes = null): PushesResources
    {
        $this->resources[] = Resource::create()
            ->script()
            ->raw()
            ->value($contents)
            ->attributes($attributes);
        return $this;
    }

    public function pushStyle(string $href, ?ComponentAttributeBag $attributes = null): PushesResources
    {
        $this->resources[] = Resource::create()
            ->style()
            ->value($href)
            ->attributes($attributes);
        return $this;
    }

    public function pushRawStyle(string $contents, ?ComponentAttributeBag $attributes = null): PushesResources
    {
        $this->resources[] = Resource::create()
            ->style()
            ->raw()
            ->value($contents)
            ->attributes($attributes);
        return $this;
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
