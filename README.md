# Add styles or scripts on the fly with Blade
[![Tests](https://github.com/laravel-honda/pushed-resources/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/laravel-honda/pushed-resources/actions/workflows/tests.yml)
[![Formats](https://github.com/laravel-honda/pushed-resources/actions/workflows/formats.yml/badge.svg?branch=master)](https://github.com/laravel-honda/pushed-resources/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/honda/pushed-resources/version)](//packagist.org/packages/honda/pushed-resources)
[![Total Downloads](https://poser.pugx.org/honda/pushed-resources/downloads)](//packagist.org/packages/honda/pushed-resources)
[![License](https://poser.pugx.org/honda/pushed-resources/license)](//packagist.org/packages/honda/pushed-resources)

## Installation

You can install the package via composer:

```bash
composer require honda/pushed-resources
```

## Usage

### Pushing resources

#### Using Blade

```html

<x-assets-script async src="script.js"/>

<x-assets-raw-script>
    console.log('Hello there!')
</x-assets-raw-script>

<x-assets-style href=" style.css"/>

<x-assets-raw-style>
    * { background: rebeccapurple }
</x-assets-raw-style>

<x-assets-blade>
    @livewireStyles
    @livewireScripts
</x-assets-blade>
```

#### Using PHP

```php
use Honda\PushedResources\Resources\Script;
use Illuminate\View\ComponentAttributeBag;

Script::create()
    ->value('something.js')
    ->attributes(['a' => 'b']) // or
    ->attributes(new ComponentAttributeBag(['a' => 'b']));
```

### Retrieving resources

#### Using Blade

```html

<x-assets-render type="*"/>
<x-assets-render type="script"/>
<x-assets-render type="script,raw-script"/>
<x-assets-render type="style,raw-style"/>
<x-assets-render type="style,raw-style"/>
```

#### Using PHP

```php
use Honda\PushedResources\Resources\Script;
use Illuminate\View\ComponentAttributeBag;

Script::create()
    ->value('something.js')
    ->attributes(['a' => 'b']) // or
    ->attributes(new ComponentAttributeBag(['a' => 'b']));
```

> You can also use `Style`, `Script`, `RawScript`, `RawStyle`, `Blade` in the same namespace

### Custom Types

A good use case for that is livewire assets, you may not want to those on a page where you are not using Livewire. You
could do something like this:

```php
// app/View/Resources/BladeScript or wherever you think it makes sense.
class BladeScript extends \Honda\PushedResources\Resources\Blade {
    public function getTag() : string{
        return 'blade-script';
    }
}
```

```php
// app/View/Components/BladeScript.php
class BladeScript extends \Honda\PushedResources\Components\Blade {}
```

```html
// in a page with livewire
<x-blade-script>
    <livewire-scripts/>
</x-blade-script>

// at the bottom of
<body> in your layout file
<x-assets-render type="blade-script"/>
```

## Testing

```bash
composer test
```

## Octane

This package is compatible with Laravel Octane.

## Credits

- [Félix Dorn](https://github.com/felixdorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. .
