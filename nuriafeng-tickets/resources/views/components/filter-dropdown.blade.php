@props([
    'label' => 'Más filtros',
    'activeCount' => 0,
])

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
            'bg-accent/10 border-accent/50 text-accent hover:bg-accent/15' => $activeCount > 0,
            'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => $activeCount === 0,
        ])
    >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        <span>{{ $label }}</span>
        @if($activeCount > 0)
            <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                {{ $activeCount }}
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
        class="fixed p-3 bg-surface border border-border rounded-xl shadow-xl z-[100]"
        :style="`top: ${pos.bottom + 8}px; right: ${window.innerWidth - pos.right}px`"
    >
        <div class="flex flex-wrap items-center gap-2 min-w-64">
            {{ $slot }}
        </div>
    </div>
</div>
