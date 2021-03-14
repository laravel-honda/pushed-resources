<?php

namespace Honda\PushedResources;

use Illuminate\View\ComponentAttributeBag;

class PushedResources
{
    public array $scripts = [];
    public array $rawScripts = [];

    public array $styles = [];
    public array $rawStyles = [];

    public function push(string $type, string $href, ?ComponentAttributeBag $attributes = null): PushedResources
    {
        $attributes ??= new ComponentAttributeBag();

        if ($type === 'scripts') {
            $this->scripts[$href] = $attributes;
        }

        $this->styles[$href] = $attributes;

        return $this;
    }

    public function pushRaw(string $type, string $contents, ?ComponentAttributeBag $attributes = null): PushedResources
    {
        $attributes ??= new ComponentAttributeBag();

        if ($type === 'scripts') {
            $this->rawScripts[] = [$contents, $attributes];
        }

        $this->rawStyles[] = [$contents, $attributes];
        return $this;
    }
}
