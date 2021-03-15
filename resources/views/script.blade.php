@php
    if ($slot->isEmpty()) {
        app('pushed-resources')->push('scripts', $href, $attributes);
    } else {
        app('pushed-resources')->pushRaw('scripts', $slot, $attributes);
    }
@endphp
