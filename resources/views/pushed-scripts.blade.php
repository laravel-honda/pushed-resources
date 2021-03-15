@foreach(app('pushed-resources')->scripts as $script => $attrs)
    <script src="{{ $script }}" {{ $attrs }}></script>
@endforeach

@foreach(app('pushed-resources')->rawScripts as $script)&
    <script {{ $scripts[1] }}>
        {!! $script[0] !!}
    </script>
@endforeach
