# Add styles or scripts on the fly with Blade
## Installation

You can install the package via composer:

```bash
composer require honda/pushed-resources
```

## Usage

**DOCUMENTATION OUTDATED**

```blade
// resources/view/components/trix.blade.php
<x-assets-style href="https://unpkg.com/trix@1.3.1/dist/trix.css" />
<x-assets-script href="https://unpkg.com/trix@1.3.1/dist/trix.js" />
<trix-editor name="content" id="content" value="">
My Editor
</trix-editor>
```

```blade
// layout.blade.php
<head>
    <x-assets-pushed-styles />
</head>
<body>

    <x-assets-pushed-scripts />
</body>
```

## Testing

```bash
composer test
```

## Octane

This package is not compatible with Octane but could easily be by just clearing the injected scripts/styles after each request. However, I have no plan to support it until we fully migrate to PHP 8. I'd accept a PR with tests and explanations.

## Credits

- [Félix Dorn](https://github.com/felixdorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
.
