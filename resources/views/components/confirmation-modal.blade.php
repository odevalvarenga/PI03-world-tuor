@props(['id', 'title', 'content', 'footer'])

<x-dialog-modal :id="$id">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}
    </x-slot>

    <x-slot name="footer">
        {{ $footer }}
    </x-slot>
</x-dialog-modal>
