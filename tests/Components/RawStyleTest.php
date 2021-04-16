<?php

use Honda\PushedResources\Components\RawStyle as Component;
use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Resources\RawStyle as Resource;
use Honda\PushedResources\Tests\TestCase;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

uses(TestCase::class);

it('registers a resource', function () {
    $component = new Component();

    expect(PushedResources::getResources())->toBeEmpty();

    $component->registerResource($attributes = new ComponentAttributeBag([
        'some' => 'thing',
    ]), $slot = new HtmlString('<h1>Hello</h1>'));

    expect(PushedResources::getResources())->toHaveCount(1);
    expect(PushedResources::getResources()[0])->toBeInstanceOf(Resource::class);
    expect(PushedResources::getResources()[0]->getAttributes())->toBe($attributes);
    expect(PushedResources::getResources()[0]->getValue())->toBe((string) $slot);
});
