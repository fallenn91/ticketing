<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
        @if(isset($icon))
            <x-slot name="icon">{{ $icon }}</x-slot>
        @endif
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="bg-surface border border-border rounded-xl shadow-soft dark:shadow-dark-soft px-4 py-5 sm:p-6">
            {{ $content }}
        </div>
    </div>
</div>
