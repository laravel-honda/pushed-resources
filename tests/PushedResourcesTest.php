<?php

use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Resources\RawScript;
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

it('can filter resources by type', function () {
    expect(PushedResources::getResources())->toBeEmpty();

    PushedResources::push($style = Style::create()->value('style.css'));
    PushedResources::push($script = Script::create()->value('script.js'));

    expect(PushedResources::getResourcesByType())->toBe([$style, $script]);
    expect(PushedResources::getResourcesByType('*'))->toBe([$style, $script]);
    expect(PushedResources::getResourcesByType('style'))->toBe([$style]);
    expect(PushedResources::getResourcesByType('Style'))->toBe([$style]);
    expect(PushedResources::getResourcesByType(Style::class))->toBe([$style]);
    expect(PushedResources::getResourcesByType('raw-script'))->toBeEmpty();
    expect(PushedResources::getResourcesByType(RawScript::class))->toBeEmpty();
    expect(PushedResources::getResourcesByType('script,style'))->toBe([$style, $script]);

    PushedResources::push($rawScript = RawScript::create()->value('console.log(1)'));

    expect(PushedResources::getResourcesByType('raw-script'))->toBe([$rawScript]);
    expect(PushedResources::getResourcesByType('rawscript'))->toBe([$rawScript]);

    $customResource = new class() extends \Honda\PushedResources\Resources\Blade {
        public function getTag(): string
        {
            return 'my-resource';
        }
    };

    PushedResources::push($customResource);
    expect(PushedResources::getResourcesByType('my-resource'))->toBe([$customResource]);
});
