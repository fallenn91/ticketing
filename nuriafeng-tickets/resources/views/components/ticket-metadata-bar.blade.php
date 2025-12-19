@props([
    'ticket',
    'users' => collect(),
    'categories' => collect(),
    'isAdmin' => false,
    'assignedToId' => null,
    'categoryId' => null,
    'wireModelAssigned' => 'assigned_to_id',
    'wireModelCategory' => 'category_id',
    'deadline' => null,
    'wireModelDeadline' => 'deadline',
    'canEdit' => false,
])

<div {{ $attributes->merge(['class' => 'grid grid-cols-2 gap-1 sm:flex sm:flex-wrap sm:items-start sm:gap-3 text-xs sm:text-sm']) }}>
    {{-- Categoría --}}
    <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Categoría">
        <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Categoría</span>
        @if($isAdmin)
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary hover:text-content transition-colors"
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    <span class="truncate">{{ $ticket->category?->name ?? 'Sin categoría' }}</span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full left-0 mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden max-h-60 overflow-y-auto"
                >
                    {{-- Opción sin categoría --}}
                    @php $isNullSelected = is_null($categoryId); @endphp
                    <button
                        type="button"
                        wire:click="$set('{{ $wireModelCategory }}', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               {{ $isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
                    >
                        <span class="text-content-muted">Sin categoría</span>
                        @if($isNullSelected)
                            <x-ui.icon-check class="w-3 h-3 sm:w-4 sm:h-4 text-accent" />
                        @endif
                    </button>

                    @foreach($categories as $category)
                        @php $isSelected = $categoryId == $category->id; @endphp
                        <button
                            type="button"
                            wire:click="$set('{{ $wireModelCategory }}', {{ $category->id }})"
                            @click="open = false"
                            class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                                   {{ $isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
                        >
                            {{ $category->name }}
                            @if($isSelected)
                                <x-ui.icon-check class="w-3 h-3 sm:w-4 sm:h-4 text-accent" />
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>
        @else
            <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                <span class="truncate">{{ $ticket->category?->name ?? 'Sin categoría' }}</span>
            </div>
        @endif
    </div>

    {{-- Responsable --}}
    <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Responsable">
        <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Responsable</span>
        @if($isAdmin)
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary hover:text-content transition-colors"
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="truncate">{{ $ticket->assignee?->name ?? 'Sin asignar' }}</span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full right-0 sm:left-0 sm:right-auto mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden max-h-60 overflow-y-auto"
                >
                    {{-- Opción sin asignar --}}
                    @php $isNullSelected = is_null($assignedToId); @endphp
                    <button
                        type="button"
                        wire:click="$set('{{ $wireModelAssigned }}', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               {{ $isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
                    >
                        <span class="text-content-muted">Sin asignar</span>
                        @if($isNullSelected)
                            <x-ui.icon-check class="w-3 h-3 sm:w-4 sm:h-4 text-accent" />
                        @endif
                    </button>

                    @foreach($users as $user)
                        @php $isSelected = $assignedToId == $user->id; @endphp
                        <button
                            type="button"
                            wire:click="$set('{{ $wireModelAssigned }}', {{ $user->id }})"
                            @click="open = false"
                            class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                                   {{ $isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
                        >
                            {{ $user->name }}
                            @if($isSelected)
                                <x-ui.icon-check class="w-3 h-3 sm:w-4 sm:h-4 text-accent" />
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>
        @else
            <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span class="truncate">{{ $ticket->assignee?->name ?? 'Sin asignar' }}</span>
            </div>
        @endif
    </div>

    {{-- Fecha de creación --}}
    <x-ticket-metadata.field label="Creado">
        <x-slot:icon>
            <svg class="w-4 h-4 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
        </x-slot:icon>
        {{ $ticket->created_at->setTimezone(config('app.timezone'))->format('d/m/Y H:i') }}
    </x-ticket-metadata.field>

    {{-- Fecha límite --}}
    @if($canEdit)
        <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Límite">
            <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Límite</span>
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    @class([
                        'inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base hover:text-content transition-colors',
                        'text-red-500 font-medium' => $ticket->deadline && $ticket->isOverdue(),
                        'text-amber-500' => $ticket->deadline && !$ticket->isOverdue() && $ticket->isNearDeadline(),
                        'text-content-secondary' => !$ticket->deadline || (!$ticket->isOverdue() && !$ticket->isNearDeadline()),
                    ])
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0" :class="{ 'text-content-muted': !{{ $ticket->deadline ? 'true' : 'false' }} }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate">
                        @if($ticket->deadline)
                            {{ $ticket->isOverdue() ? 'Vencido:' : '' }}
                            {{ $ticket->deadline->format('d/m/Y') }}
                        @else
                            Sin límite
                        @endif
                    </span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full right-0 sm:left-0 sm:right-auto mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden"
                >
                    {{-- Opción sin fecha límite --}}
                    @php $isNullSelected = is_null($deadline); @endphp
                    <button
                        type="button"
                        wire:click="$set('{{ $wireModelDeadline }}', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               {{ $isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
                    >
                        <span class="text-content-muted">Sin fecha límite</span>
                        @if($isNullSelected)
                            <x-ui.icon-check class="w-3 h-3 sm:w-4 sm:h-4 text-accent" />
                        @endif
                    </button>

                    {{-- Selector de fecha --}}
                    <div class="px-2 py-1.5 sm:px-3 sm:py-2 border-t border-border">
                        <input
                            type="date"
                            wire:model.live="{{ $wireModelDeadline }}"
                            @change="open = false"
                            class="w-full px-2 py-1 sm:py-1.5 text-xs sm:text-sm bg-surface-secondary border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-colors"
                        />
                    </div>
                </div>
            </div>
        </div>
    @elseif($ticket->deadline)
        <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50" title="Límite">
            <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Límite</span>
            <div @class([
                'inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base transition-colors duration-150',
                'text-red-500 font-medium' => $ticket->isOverdue(),
                'text-amber-500' => !$ticket->isOverdue() && $ticket->isNearDeadline(),
                'text-content-secondary' => !$ticket->isOverdue() && !$ticket->isNearDeadline(),
            ])>
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="truncate">
                    {{ $ticket->isOverdue() ? 'Vencido:' : '' }}
                    {{ $ticket->deadline->format('d/m/Y') }}
                </span>
            </div>
        </div>
    @endif

    {{-- Fecha de actualización (solo si es diferente a creación) --}}
    @if($ticket->updated_at->gt($ticket->created_at))
        <x-ticket-metadata.field label="Actualizado">
            <x-slot:icon>
                <svg class="w-4 h-4 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </x-slot:icon>
            <x-relative-time :date="$ticket->updated_at" resetEvent="saved" />
        </x-ticket-metadata.field>
    @endif
</div>
