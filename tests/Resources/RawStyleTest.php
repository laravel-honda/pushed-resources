<?php

use Honda\PushedResources\Resources\RawStyle;

it('renders', function () {
    $resource = RawStyle::create()->value('* {}')
        ->attributes([
            'a' => 'b',
        ]);

    expect($resource->render())->toBe('<style a="b">* {}</style>');
});
