@props([
    'label',
    'options' => [],
    'wireModel',
    'value' => null,
    'nullable' => false,
    'nullLabel' => 'Sin asignar',
    'placeholder' => 'Seleccionar...',
    'disabled' => false,
    'hasError' => false,
    'required' => false,
])

@php
    // Normalizar opciones - soportar arrays asociativos y Collections
    $normalizedOptions = collect($options)->map(function($item, $key) {
        if (is_object($item)) {
            return ['value' => (string) $item->id, 'label' => $item->name];
        }
        return ['value' => (string) $key, 'label' => $item];
    })->values()->all();

    $stringValue = is_null($value) ? '' : (string) $value;

    // Encontrar el label del valor seleccionado
    $selectedLabel = null;
    if ($stringValue !== '') {
        foreach ($normalizedOptions as $opt) {
            if ($opt['value'] === $stringValue) {
                $selectedLabel = $opt['label'];
                break;
            }
        }
    } elseif ($nullable) {
        $selectedLabel = $nullLabel;
    }
@endphp

<div
    x-data="{ open: false }"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    class="relative"
>
    {{-- Trigger Button --}}
    <button
        type="button"
        @click="open = !open"
        @keydown.arrow-down.prevent="open = true"
        @keydown.arrow-up.prevent="open = true"
        @keydown.enter.prevent="open = !open"
        @keydown.space.prevent="open = !open"
        {{ $disabled ? 'disabled' : '' }}
        class="w-full flex items-center justify-between gap-2 px-3.5 py-2.5 text-sm rounded-lg
               border transition-all duration-150
               {{ $hasError
                   ? 'border-red-500 ring-1 ring-red-500/30'
                   : 'border-border hover:border-border/80' }}
               bg-surface
               disabled:opacity-50 disabled:cursor-not-allowed"
        :class="{ 'ring-2 ring-accent/20 border-accent': open && !{{ $hasError ? 'true' : 'false' }} }"
        aria-haspopup="listbox"
        :aria-expanded="open"
    >
        <div class="flex flex-col items-start text-left min-w-0">
            <span class="text-[10px] uppercase tracking-wider text-content-muted">{{ $label }}@if($required)<span class="text-red-500 ml-0.5">*</span>@endif</span>
            <span class="font-medium text-content truncate">
                {{ $selectedLabel ?? $placeholder }}
            </span>
        </div>
        <svg
            class="w-4 h-4 text-content-muted transition-transform duration-150 shrink-0"
            :class="{ 'rotate-180': open }"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    {{-- Dropdown Panel --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-cloak
        class="absolute top-full left-0 right-0 mt-1.5 bg-surface border border-border
               rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden max-h-60 overflow-y-auto"
        role="listbox"
    >
        {{-- Opción nula (si nullable) --}}
        @if($nullable && $stringValue !== '')
            <button
                type="button"
                wire:click="$set('{{ $wireModel }}', null)"
                @click="open = false"
                class="w-full px-3.5 py-2.5 text-left text-sm flex items-center transition-colors
                       text-content-secondary hover:bg-surface-secondary"
                role="option"
            >
                {{ $nullLabel }}
            </button>
        @endif

        {{-- Opciones (excluyendo la seleccionada) --}}
        @foreach($normalizedOptions as $option)
            @if($option['value'] !== $stringValue)
                <button
                    type="button"
                    wire:click="$set('{{ $wireModel }}', '{{ $option['value'] }}')"
                    @click="open = false"
                    class="w-full px-3.5 py-2.5 text-left text-sm flex items-center transition-colors
                           text-content hover:bg-surface-secondary"
                    role="option"
                >
                    {{ $option['label'] }}
                </button>
            @endif
        @endforeach

        {{-- Estado vacío --}}
        @if(count($normalizedOptions) === 0 || (count($normalizedOptions) === 1 && $normalizedOptions[0]['value'] === $stringValue))
            <div class="px-3.5 py-2.5 text-sm text-content-muted text-center">
                No hay más opciones
            </div>
        @endif
    </div>
</div>
