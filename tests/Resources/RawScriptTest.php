<?php

use Honda\PushedResources\Resources\RawScript;

it('renders', function () {
    $resource = RawScript::create()->value('console.log(1)')
        ->attributes([
            'a' => 'b',
        ]);

    expect($resource->render())->toBe('<script a="b">console.log(1)</script>');
});
