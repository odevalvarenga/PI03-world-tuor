@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 bg-gray-100 focus:outline-none transition'
            : 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
