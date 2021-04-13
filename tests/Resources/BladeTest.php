<?php

use Honda\PushedResources\Resources\Blade as BladeResource;
use Honda\PushedResources\Tests\TestCase;

uses(TestCase::class);

it('renders', function () {
    $resource = BladeResource::create()->value('{{ $a }}{{ $attributes }}')->attributes([
        'a' => 'b',
    ])->inject('a', 'attributes: ');

    expect($resource->render())->toBe('attributes: a="b"');
});
