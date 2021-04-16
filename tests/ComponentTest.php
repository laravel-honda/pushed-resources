<?php

use Honda\PushedResources\Components\Component;
use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\PushedResource;
use Honda\PushedResources\Resources\Script;
use Honda\PushedResources\Tests\TestCase;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

uses(TestCase::class);

it('registers a resource on render', function () {
    $class = new class() extends Component {
        public static PushedResource $resource;

        public function registerResource(ComponentAttributeBag $attributes, HtmlString $slot): void
        {
            expect($attributes->getAttributes())->toBe([
                'a' => 'b',
            ]);

            expect((string) $slot)->toBe('<h1>Hello world</h1>');

            $this->push(static::$resource);
        }
    };

    expect(PushedResources::getResources())->toBeEmpty();

    $class::$resource = Script::create()->value('script.js');

    $class->render()([
        'attributes' => new ComponentAttributeBag([
            'a' => 'b',
        ]),
        'slot' => new HtmlString('<h1>Hello world</h1>'),
    ]);

    expect(PushedResources::getResources())->toBe([
        $class::$resource,
    ]);
});
