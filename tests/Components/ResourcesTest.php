<?php

use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Resources\Script;
use Honda\PushedResources\Tests\TestCase;

uses(TestCase::class);

it('renders all resources', function () {
    PushedResources::push(
        Script::create()->value('script.js')
    );

    $this->assertComponentRenders(
        '<script src="script.js"></script>',
        '<x-assets-resources />'
    );
});
