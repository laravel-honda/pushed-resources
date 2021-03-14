@php
    use App\Support\Scripts;
    if ($slot->isEmpty()) {
        Scripts::push($href, $attributes);
    } else {
        Scripts::pushRaw($slot);
    }
@endphp
