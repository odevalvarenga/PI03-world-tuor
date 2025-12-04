@props(['id' => null, 'maxWidth' => null])

<x-dialog-modal :id="$id" :maxWidth="$maxWidth">
    {{ $slot }}
</x-dialog-modal>
