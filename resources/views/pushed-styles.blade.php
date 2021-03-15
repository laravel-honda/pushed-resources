@foreach(app('pushed-resources')->styles as $style => $attrs)
    <link rel="stylesheet" href="{{ $style }}" {{ $attrs }}>
@endforeach

@foreach(app('pushed-resources')->rawStyles as $style)
    <style {{ $style[1] }}>
        {!! $style[0] !!}
    </style>
@endforeach
