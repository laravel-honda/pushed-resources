<?php

namespace Honda\PushedResources\Facades;

use Honda\PushedResources\PushedResource;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Honda\PushedResources\PushedResources push(PushedResource|callable $resource)
 * @method static PushedResource[] getResources()
 * @method static PushedResource[] getResourcesByType(string $type = '*')
 */
class PushedResources extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pushed-resources';
    }
}
