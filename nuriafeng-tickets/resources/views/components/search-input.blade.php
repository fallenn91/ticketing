@props(['placeholder' => 'Buscar...', 'wireModel' => 'search'])

<div class="relative group"
     x-data="{ focused: false, hasValue: false }"
     x-init="hasValue = $refs.input.value.length > 0"
     @focusin="focused = true"
     @focusout="focused = false">
    <input
        x-ref="input"
        wire:model.live.debounce.300ms="{{ $wireModel }}"
        type="text"
        placeholder="{{ $placeholder }}"
        @input="hasValue = $event.target.value.length > 0"
        {{ $attributes->merge(['class' => 'w-full pl-10 pr-10 px-3.5 py-2.5 bg-surface border border-border rounded-lg text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80']) }}
    />
    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-content-muted transition-all duration-200"
         :class="{ 'text-accent scale-110': focused, 'text-content-muted': !focused }"
         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    <div wire:loading wire:target="{{ $wireModel }}"
         class="absolute right-3 top-1/2 -translate-y-1/2 animate-fade-in">
        <x-loading-spinner size="sm" class="text-accent" />
    </div>
    <button x-show="hasValue && !$wire.{{ $wireModel }}"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75"
            @click="$refs.input.value = ''; $refs.input.dispatchEvent(new Event('input')); hasValue = false"
            type="button"
            wire:loading.remove wire:target="{{ $wireModel }}"
            class="absolute right-3 top-1/2 -translate-y-1/2 p-0.5 text-content-muted hover:text-content rounded transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
