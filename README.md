# Add styles or scripts on the fly in Blade
## Installation

You can install the package via composer:

```bash
composer require honda/pushed-resources
```

## Usage

```blade
// resources/view/components/trix.blade.php
<x-ui::style href="https://unpkg.com/trix@1.3.1/dist/trix.css" />
<x-ui::script href="https://unpkg.com/trix@1.3.1/dist/trix.js" />
<trix-editor name="content" id="content" value="">
My Editor
</trix-editor>
```

```blade
// layout.blade.php
<head>
    <x-ui::pushed-styles />
</head>
<body>

    <x-ui::pushed-scripts />
</body>
```

## Testing

```bash
composer test
```

## Credits

- [Félix Dorn](https://github.com/FélixDorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
