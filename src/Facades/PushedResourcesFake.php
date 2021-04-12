<?php

namespace Honda\PushedResources\Facades;

use Honda\PushedResources\PushedResources;
use Honda\PushedResources\Resource;
use PHPUnit\Framework\TestCase as PHPUnit;

class PushedResourcesFake extends PushedResources
{
    public function assertHasResource(Resource $comparison): void
    {
        PHPUnit::assertNotEmpty($this->resources);

        /** @var resource $resource */
        foreach ($this->resources as $resource) {
            if ($this->isSame($resource, $comparison)) {
                PHPUnit::assertTrue(true);

                return;
            }
        }

        PHPUnit::assertTrue(
            false,
            'The given resource has not been registered.'
        );
    }

    protected function isSame(Resource $resource, Resource $comparison): bool
    {
        if ($resource->getValue() !== $comparison->getValue()) {
            return false;
        }

        if ($resource->getAttributes()->getAttributes() !== $comparison->getAttributes()->getAttributes()) {
            return false;
        }

        if (get_class($resource) !== get_class($comparison)) {
            return false;
        }

        return true;
    }
}
