<?php

namespace Honda\PushedResources\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Honda\PushedResources\PushedResources
 */
class PushedResourcesFacade extends Facade
{
    public static function fake(): PushedResourcesFake
    {
        static::swap($fake = new PushedResourcesFake());

        return $fake;
    }

    protected static function getFacadeAccessor(): string
    {
        return 'pushed-resources';
    }
}
