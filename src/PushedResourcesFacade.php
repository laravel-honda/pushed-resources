<?php

namespace Honda\PushedResources;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Honda\PushedResources\PushedResources
 */
class PushedResourcesFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pushed-resources';
    }
}
