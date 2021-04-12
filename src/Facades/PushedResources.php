<?php

namespace Honda\PushedResources\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Honda\PushedResources\PushedResources push(\Honda\PushedResources\PushedResource|callable $resource)
 * @method static \Honda\PushedResources\PushedResource[] getResources()
 */
class PushedResources extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pushed-resources';
    }
}
