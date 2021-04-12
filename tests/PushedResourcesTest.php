<?php

use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Resources\Script;
use Honda\PushedResources\Resources\Style;
use Honda\PushedResources\Tests\TestCase;

uses(TestCase::class);

it('can push a resource', function () {
    expect(PushedResources::getResources())->toBeEmpty();

    PushedResources::push(
        $resource = Script::create()->value('script.js')
    );

    expect(PushedResources::getResources())->toBe([$resource]);
});

it('can push a callable that returns a resource', function () {
    expect(PushedResources::getResources())->toBeEmpty();

    $resource = Style::create()->value('style.css');

    PushedResources::push(fn () => $resource);

    expect(PushedResources::getResources())->toBe([$resource]);
});
