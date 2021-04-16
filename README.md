# Add styles or scripts on the fly with Blade

## Installation

You can install the package via composer:

```bash
composer require honda/pushed-resources
```

## Usage

### Pushing resources

#### Using Blade

```html

<x-assets-script async src="script.js" />

<x-assets-raw-script>
    console.log('Hello there!')
</x-assets-raw-script>

<x-assets-style href=" style.css" />

<x-assets-raw-style>
    * { background: rebeccapurple
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

<x-assets-resources type="*"/>
<x-assets-resources type="script"/>
<x-assets-resources type="script,raw-script"/>
<x-assets-resources type="style,raw-style"/>
<x-assets-resources type="style,raw-style"/>
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
<x-assets-resources type="blade-script"/>
```

## Testing

```bash
composer test
```

## Octane

This package is not compatible with Octane but could easily be by just clearing the injected resources after each
request. However, I have no plan to support it until we fully migrate to PHP 8. I'd accept a PR with tests

## Credits

- [Félix Dorn](https://github.com/felixdorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. .
