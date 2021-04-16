<?php

namespace Honda\PushedResources\Tests;

use Gajus\Dindent\Indenter;
use Honda\PushedResources\Facades\PushedResources;
use Honda\PushedResources\Providers\PushedResourcesServiceProvider;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $indenter = new Indenter();
        $indenter->setElementType('h1', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('del', Indenter::ELEMENT_TYPE_INLINE);

        $blade    = (string) $this->blade($template, $data);
        $indented = $indenter->indent($blade);
        $cleaned  = str_replace(
            [' >', "\n/>", ' </div>', '> ', "\n>"],
            ['>', ' />', "\n</div>", ">\n    ", '>'],
            $indented,
        );

        $this->assertSame($expected, $cleaned);
    }

    protected function blade(string $template, array $data = []): TestView
    {
        $tempDirectory = sys_get_temp_dir();

        if (!in_array($tempDirectory, ViewFacade::getFinder()->getPaths())) {
            ViewFacade::addLocation(sys_get_temp_dir());
        }

        $tempFile = tempnam($tempDirectory, 'laravel-blade') . '.blade.php';

        file_put_contents($tempFile, $template);

        return new TestView(view(Str::before(basename($tempFile), '.blade.php'), $data));
    }

    protected function getPackageProviders($app): array
    {
        return [
            PushedResourcesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'PushedResources' => PushedResources::class,
        ];
    }
}
