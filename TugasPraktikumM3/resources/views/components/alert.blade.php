@props(['type' => 'info', 'title' => null])

<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }}>
    @if ($title)
        <strong>{{ $title }}</strong><br>
    @endif
    {{ $slot }}
</div>
