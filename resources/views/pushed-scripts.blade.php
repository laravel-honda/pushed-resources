@foreach(app('pushed-resources')->pushedScripts as $script => $attrs)
    <script src="{{ $script }}" {{ $attrs }}></script>
@endforeach

@foreach(app('pushed-resources')->pushedRaw as $script)&
    <script {{ $scripts[1] }}>
        {!! $script[0] !!}
    </script>
@endforeach
