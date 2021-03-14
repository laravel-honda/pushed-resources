@php
    if ($slot->isEmpty()) {
        app('pushed-resources')->push('styles', $href, $attributes);
    } else {
        app('pushed-resources')->pushRaw('styles', $slot, $attributes);
    }
@endphp
