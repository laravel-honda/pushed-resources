<?php

namespace Honda\PushedResources;

use Illuminate\Support\Str;

class PushedResources
{
    /** @var PushedResource[] */
    protected array $resources = [];

    public function push(callable|PushedResource $resource): self
    {
        /* @phpstan-ignore-next-line */
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

        $types = explode(',', $type);

        return collect($this->resources)
            ->filter(function (PushedResource $resource) use ($types) {
                $transform = fn ($string): string => Str::of(class_basename($string))->snake('-')->lower()->replace('-', '');

                foreach ($types as $type) {
                    if ($transform($resource->getTag()) === $transform($type)) {
                        return true;
                    }
                }

                return false;
            })
            // Re-indexing the collection
            ->values()->toArray();
    }
}
