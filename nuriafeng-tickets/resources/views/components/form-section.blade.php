@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
        @if(isset($icon))
            <x-slot name="icon">{{ $icon }}</x-slot>
        @endif
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="bg-surface border border-border rounded-xl shadow-soft dark:shadow-dark-soft px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>

                @if (isset($actions))
                    <div class="flex items-center justify-end mt-6">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
