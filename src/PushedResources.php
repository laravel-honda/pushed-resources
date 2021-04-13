<?php

namespace Honda\PushedResources;

use Illuminate\Support\Str;

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

    public function getResourcesByType(string $type = '*'): array
    {
        if ($type === '*') {
            return $this->resources;
        }

        return collect($this->resources)
            ->filter(function (PushedResource $resource) use ($type) {
                $transform = fn ($string): string => strtolower(Str::slug(class_basename($string)));

                return $transform($resource) === $transform($type);
            })
            ->toArray();
    }
}
