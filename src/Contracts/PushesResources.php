<?php


namespace Honda\PushedResources\Contracts;


use Illuminate\View\ComponentAttributeBag;

interface PushesResources
{
    public function pushScript(string $href, ?ComponentAttributeBag $attributes = null): self;

    public function pushRawScript(string $contents, ?ComponentAttributeBag $attributes = null): self;

    public function pushStyle(string $href, ?ComponentAttributeBag $attributes = null): self;

    public function pushRawStyle(string $contents, ?ComponentAttributeBag $attributes = null): self;

    public function getResources(): array;
}
