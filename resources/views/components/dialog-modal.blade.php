@props(['id', 'maxWidth' => '2xl'])

<div x-data="{ show: false }"
     x-on:open-modal.window="if ($event.detail == '{{ $id }}') show = true"
     x-on:close-modal.window="show = false">

    <div x-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0">
        <div x-show="show" class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>

        <div x-show="show"
             class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto sm:max-w-{{ $maxWidth }}">

            {{ $slot }}

        </div>
    </div>
</div>

