<?php

use Honda\PushedResources\Resources\Style;

it('renders', function () {
    $resource = Style::create()->value('style.css')
        ->attributes([
            'a' => 'b',
        ]);

    expect($resource->render())->toBe('<link rel="stylesheet" href="style.css" a="b">');
});
