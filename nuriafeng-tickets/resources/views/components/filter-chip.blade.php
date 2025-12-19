@props([
    'label',
    'options' => [],
    'wireModel',
    'value' => [],
])

@php
    $selectedValues = is_array($value) ? $value : ($value ? [$value] : []);
    $hasValue = count($selectedValues) > 0;
    $selectedCount = count($selectedValues);
@endphp

<div
    x-data="{ open: false, pos: {} }"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    class="relative shrink-0"
>
    <button
        type="button"
        x-ref="btn"
        @click="pos = $refs.btn.getBoundingClientRect(); open = !open"
        @class([
            'inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-full border transition-all duration-200 whitespace-nowrap active:scale-[0.97]',
            'bg-accent/10 border-accent/50 text-accent hover:bg-accent/15' => $hasValue,
            'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$hasValue,
        ])
    >
        <span>{{ $label }}</span>
        @if($selectedCount > 0)
            <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                {{ $selectedCount }}
            </span>
        @endif
        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div
        x-show="open"
        x-transition.opacity.duration.150ms
        x-cloak
        class="fixed min-w-48 max-h-72 overflow-y-auto bg-surface border border-border rounded-xl shadow-xl z-[100]"
        :style="`top: ${pos.bottom + 8}px; left: ${pos.left}px`"
    >
        <div class="py-1.5">
            @foreach($options as $key => $optionLabel)
                @php $isSelected = in_array($key, $selectedValues); @endphp
                <button
                    type="button"
                    wire:click="toggleFilter('{{ $wireModel }}', '{{ $key }}')"
                    @class([
                        'w-full px-3.5 py-2.5 text-left text-sm flex items-center gap-3 transition-colors',
                        'bg-accent/10 text-accent' => $isSelected,
                        'text-content hover:bg-surface-secondary' => !$isSelected,
                    ])
                >
                    <span @class([
                        'shrink-0 w-4 h-4 rounded border-2 flex items-center justify-center transition-colors',
                        'bg-accent border-accent' => $isSelected,
                        'border-content-muted/50' => !$isSelected,
                    ])>
                        @if($isSelected)
                            <x-ui.icon-check class="w-2.5 h-2.5 text-white" strokeWidth="3" />
                        @endif
                    </span>
                    <span class="{{ $isSelected ? 'font-medium' : '' }}">{{ $optionLabel }}</span>
                </button>
            @endforeach

            @if($hasValue)
                <div class="border-t border-border/50 mt-1.5 pt-1.5">
                    <button
                        type="button"
                        wire:click="clearFilter('{{ $wireModel }}')"
                        @click="open = false"
                        class="w-full px-3.5 py-2.5 text-left text-sm text-content-muted hover:text-content hover:bg-surface-secondary transition-colors flex items-center gap-2"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Limpiar filtro
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
