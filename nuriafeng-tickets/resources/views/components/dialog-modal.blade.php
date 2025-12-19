@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-content">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-content-muted">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-surface-secondary border-t border-border text-end rounded-b-xl">
        {{ $footer }}
    </div>
</x-modal>
