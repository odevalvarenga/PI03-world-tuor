@props(['align' => 'right', 'width' => '48'])

@php
$alignmentClasses = match($align) {
    'left' => 'origin-top-left left-0',
    'center' => 'origin-top center-0 left-1/2 -translate-x-1/2 transform',
    default => 'origin-top-right right-0',
};

$width = match($width) {
    '48' => 'w-48',
    default => 'w-48',
};
@endphp

<div class="relative" x-data="{ open: false }">
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:leave="transition ease-in duration-150"
        @click.outside="open = false"
        class="absolute z-50 mt-2 rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none;"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white {{ $width }}">
            {{ $content }}
        </div>
    </div>
</div>

