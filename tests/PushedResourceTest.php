<?php

use Honda\PushedResources\Resources\Script;

it('has attributes', function () {
    $resource = Script::create()->value('script.js')->attributes([
        'a' => 'b',
    ]);

    expect($resource->hasAttributes())->toBeTrue();
});
