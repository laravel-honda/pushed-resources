<?php

namespace Honda\PushedResources;

class PushedResources
{
    /** @var PushedResource[] */
    protected array $resources = [];

    /**
     * @param callable|PushedResource $resource
     *
     * @return $this
     */
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
