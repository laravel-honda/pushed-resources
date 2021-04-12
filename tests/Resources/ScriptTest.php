<?php

use Honda\PushedResources\Resources\Script;

it('renders', function () {
    $resource = Script::create()->value('script.js')
        ->attributes([
            'a' => 'b',
        ]);

    expect($resource->render())->toBe('<script src="script.js" a="b"></script>');
});
