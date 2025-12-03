@props(['align' => 'right', 'width' => '48'])

@php
$alignmentClasses = [
    'left' => 'origin-top-left left-0',
    'right' => 'origin-top-right right-0',
];

$widthClasses = [
    '48' => 'w-48',
];
@endphp

<div x-data="{ open: false }" class="relative">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute z-50 mt-2 rounded-md shadow-lg {{ $widthClasses[$width] }} {{ $alignmentClasses[$align] }}"
        style="display: none;"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white">
            {{ $content }}
        </div>
    </div>
</div>
