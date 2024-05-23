@props(["active"])

@php
$classes = ($active ?? false)
            ? 'text-gray-900'
            : 'text-gray-500 hover:text-gray-900 hover:bg-green-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>