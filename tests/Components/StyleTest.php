<?php

use Honda\PushedResources\Components\Style as Component;
use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Resources\Style as Resource;
use Honda\PushedResources\Tests\TestCase;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

uses(TestCase::class);

it('registers a resource', function () {
    $component = new Component('style.css');

    expect(PushedResources::getResources())->toBeEmpty();

    $component->registerResource($attributes = new ComponentAttributeBag([
        'some' => 'thing',
    ]), $slot = new HtmlString());

    expect(PushedResources::getResources())->toHaveCount(1);
    expect(PushedResources::getResources()[0])->toBeInstanceOf(Resource::class);
    expect(PushedResources::getResources()[0]->getAttributes())->toBe($attributes);
    expect(PushedResources::getResources()[0]->getValue())->toBe('style.css');
});
