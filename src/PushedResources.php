<?php

namespace Honda\PushedResources;

class PushedResources
{
    /** @var resource[] */
    protected array $resources;

    public function push($resource): self
    {
        $this->resources[] = value($resource);

        return $this;
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
