@foreach(app('pushed-resources')->pushedStyles as $style => $attrs)
    <link rel="stylesheet" href="{{ $style }}" {{ $attrs }}>
@endforeach

@foreach(app('pushed-resources')->pushedRaw as $style)
    <style {{ $style[1] }}>
        {!! $style[0] !!}
    </style>
@endforeach
