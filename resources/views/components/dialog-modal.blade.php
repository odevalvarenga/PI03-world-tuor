@props(['id', 'maxWidth' => '2xl'])

@php
$maxWidth = match ($maxWidth) {
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
    default => 'sm:max-w-2xl',
};
@endphp

<div
    x-data="{ show: false }"
    x-on:open-modal.window="if ($event.detail.id === '{{ $id }}') show = true"
    x-on:close-modal.window="if ($event.detail.id === '{{ $id }}') show = false"
    x-show="show"
    class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
>
    <div x-show="show" class="fixed inset-0 transform transition-all bg-gray-500 bg-opacity-75"></div>

    <div
        x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
    >
        {{ $slot }}
    </div>
</div>
