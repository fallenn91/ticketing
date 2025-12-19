@props([
    'title',
    'total',
    'showStats' => false,
    'stats' => [],
    'status' => [],
])

<div class="mb-6">
    {{-- Desktop (lg+): Todo en una línea --}}
    <div class="hidden lg:flex lg:items-center lg:gap-6">
        <div class="flex items-center gap-4 flex-1">
            <h3 class="text-lg font-semibold text-content">{{ $title }}</h3>
            <span class="text-sm text-content-muted">{{ $total }} {{ $total === 1 ? 'ticket' : 'tickets' }}</span>

            @if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0))
            <div class="flex items-center gap-2">
                @if(($stats['abierto'] ?? 0) > 0)
                <button wire:click="toggleFilter('status', 'abierto')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-500/20 transition-colors cursor-pointer {{ in_array('abierto', $status) ? 'ring-2 ring-blue-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    {{ $stats['abierto'] }} abiertos
                </button>
                @endif
                @if(($stats['en_proceso'] ?? 0) > 0)
                <button wire:click="toggleFilter('status', 'en_proceso')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors cursor-pointer {{ in_array('en_proceso', $status) ? 'ring-2 ring-amber-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    {{ $stats['en_proceso'] }} en proceso
                </button>
                @endif
                @if(($stats['resuelto'] ?? 0) > 0)
                <button wire:click="toggleFilter('status', 'resuelto')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors cursor-pointer {{ in_array('resuelto', $status) ? 'ring-2 ring-emerald-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    {{ $stats['resuelto'] }} resueltos
                </button>
                @endif
            </div>
            @endif
        </div>

        <x-ui.button :href="route('tickets.create')" class="shrink-0">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <span>Nuevo Ticket</span>
        </x-ui.button>
    </div>

    {{-- Tablet (sm a lg): 2 filas con badges completos --}}
    <div class="hidden sm:flex sm:flex-col lg:hidden gap-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-lg font-semibold text-content">{{ $title }}</h3>
                <span class="text-sm text-content-muted">{{ $total }} {{ $total === 1 ? 'ticket' : 'tickets' }}</span>
            </div>
            <x-ui.button :href="route('tickets.create')" class="shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Nuevo Ticket</span>
            </x-ui.button>
        </div>

        @if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0))
        <div class="flex items-center gap-2">
            @if(($stats['abierto'] ?? 0) > 0)
            <button wire:click="toggleFilter('status', 'abierto')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-500/20 transition-colors cursor-pointer {{ in_array('abierto', $status) ? 'ring-2 ring-blue-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                {{ $stats['abierto'] }} abiertos
            </button>
            @endif
            @if(($stats['en_proceso'] ?? 0) > 0)
            <button wire:click="toggleFilter('status', 'en_proceso')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors cursor-pointer {{ in_array('en_proceso', $status) ? 'ring-2 ring-amber-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                {{ $stats['en_proceso'] }} en proceso
            </button>
            @endif
            @if(($stats['resuelto'] ?? 0) > 0)
            <button wire:click="toggleFilter('status', 'resuelto')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors cursor-pointer {{ in_array('resuelto', $status) ? 'ring-2 ring-emerald-500 ring-offset-1 dark:ring-offset-gray-900' : '' }}">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                {{ $stats['resuelto'] }} resueltos
            </button>
            @endif
        </div>
        @endif
    </div>

    {{-- Mobile: Layout de 2 filas --}}
    <div class="flex flex-col gap-3 sm:hidden">
        {{-- Row 1: Título + Botón --}}
        <div class="flex items-center justify-between gap-4">
            <h3 class="text-lg font-semibold text-content truncate">{{ $title }}</h3>
            <x-ui.new-ticket-button class="shrink-0" />
        </div>

        {{-- Row 2: Count + Stats --}}
        @if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0))
            <div class="flex items-baseline gap-2 text-sm">
                <span class="text-content-muted">{{ $total }} {{ $total === 1 ? 'ticket' : 'tickets' }}</span>
                <span class="text-content-muted/30">·</span>
                <div class="flex items-baseline gap-1 font-medium">
                    @if(($stats['abierto'] ?? 0) > 0)
                        <button wire:click="toggleFilter('status', 'abierto')"
                                class="text-blue-600 dark:text-blue-400 hover:underline {{ in_array('abierto', $status) ? 'font-bold' : '' }}">
                            {{ $stats['abierto'] }}A
                        </button>
                    @endif
                    @if(($stats['en_proceso'] ?? 0) > 0)
                        <span class="text-content-muted/50">·</span>
                        <button wire:click="toggleFilter('status', 'en_proceso')"
                                class="text-amber-600 dark:text-amber-400 hover:underline {{ in_array('en_proceso', $status) ? 'font-bold' : '' }}">
                            {{ $stats['en_proceso'] }}P
                        </button>
                    @endif
                    @if(($stats['resuelto'] ?? 0) > 0)
                        <span class="text-content-muted/50">·</span>
                        <button wire:click="toggleFilter('status', 'resuelto')"
                                class="text-emerald-600 dark:text-emerald-400 hover:underline {{ in_array('resuelto', $status) ? 'font-bold' : '' }}">
                            {{ $stats['resuelto'] }}R
                        </button>
                    @endif
                </div>
            </div>
        @else
            <span class="text-sm text-content-muted">{{ $total }} {{ $total === 1 ? 'ticket' : 'tickets' }}</span>
        @endif
    </div>
</div>
