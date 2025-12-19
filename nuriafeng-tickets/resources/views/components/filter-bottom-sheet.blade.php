@props([
    'statuses' => [],
    'priorities' => [],
    'deadlineOptions' => [],
    'status' => [],
    'priority' => [],
    'deadline' => [],
    'activeFilterCount' => 0,
    'extraFilters' => [],
    'types' => [],
    'categories' => null,
    'users' => null,
    'type' => [],
    'category' => [],
    'creator' => [],
    'assignee' => [],
    'showTrigger' => true,
    // Sorting props:
    'sortField' => 'created_at',
    'sortDirection' => 'desc',
    'sortFields' => [],
])

@php
    $selectedStatuses = is_array($status) ? $status : ($status ? [$status] : []);
    $selectedPriorities = is_array($priority) ? $priority : ($priority ? [$priority] : []);
    $selectedDeadlines = is_array($deadline) ? $deadline : ($deadline ? [$deadline] : []);
    $selectedTypes = is_array($type) ? $type : ($type ? [$type] : []);
    $selectedCategories = is_array($category) ? $category : ($category ? [$category] : []);
    $selectedCreators = is_array($creator) ? $creator : ($creator ? [$creator] : []);
    $selectedAssignees = is_array($assignee) ? $assignee : ($assignee ? [$assignee] : []);
@endphp

<x-ui.bottom-sheet name="filter" title="Filtros">
    @if($showTrigger)
        <x-slot name="trigger">
            <button
                type="button"
                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl
                       bg-surface-secondary border border-border text-content
                       hover:bg-surface-tertiary active:scale-[0.97] transition-all duration-200"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span>Filtros</span>
                @if($activeFilterCount > 0)
                    <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                        {{ $activeFilterCount }}
                    </span>
                @endif
            </button>
        </x-slot>
    @endif

    {{-- Clear filters icon in header (only when filters are active) --}}
    @if($activeFilterCount > 0)
        <x-slot name="headerActions">
            <button
                type="button"
                wire:click="clearFilters"
                class="p-2 rounded-full text-content-muted hover:text-accent hover:bg-accent/10 transition-colors"
                title="Limpiar filtros"
            >
                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </x-slot>
    @endif

    <div class="px-4 py-3 space-y-4">
        {{-- Sorting Section --}}
        @if(count($sortFields) > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Ordenar por</h4>

                {{-- Sort Field Selection --}}
                <div class="flex flex-wrap gap-2 mb-3">
                    @foreach($sortFields as $field => $label)
                        @php $isSelected = $sortField === $field; @endphp
                        <button
                            type="button"
                            wire:click="sortBy('{{ $field }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>

                {{-- Sort Direction Toggle --}}
                <div class="flex items-center gap-2">
                    <span class="text-xs text-content-muted">Orden:</span>
                    <div class="inline-flex rounded-lg border border-border overflow-hidden">
                        @foreach(['asc' => 'Ascendente', 'desc' => 'Descendente'] as $dir => $dirLabel)
                            @php $isDirSelected = $sortDirection === $dir; @endphp
                            <button
                                type="button"
                                wire:click="setSortDirection('{{ $dir }}')"
                                @class([
                                    'px-3 py-1.5 text-xs font-medium transition-all duration-200',
                                    'bg-accent text-white' => $isDirSelected,
                                    'bg-surface-secondary text-content hover:bg-surface-tertiary' => !$isDirSelected,
                                ])
                            >
                                <span class="flex items-center gap-1">
                                    @if($dir === 'asc')
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                    {{ $dirLabel }}
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Visual separator --}}
            <div class="border-t border-border/50"></div>
        @endif

        @if(count($statuses) > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Estado</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($statuses as $key => $label)
                        @php $isSelected = in_array($key, $selectedStatuses); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('status', '{{ $key }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(count($priorities) > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Prioridad</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($priorities as $key => $label)
                        @php $isSelected = in_array($key, $selectedPriorities); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('priority', '{{ $key }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(count($deadlineOptions) > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Fecha limite</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($deadlineOptions as $key => $label)
                        @php $isSelected = in_array($key, $selectedDeadlines); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('deadline', '{{ $key }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(in_array('type', $extraFilters) && count($types) > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Tipo</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($types as $key => $label)
                        @php $isSelected = in_array($key, $selectedTypes); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('type', '{{ $key }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(in_array('category', $extraFilters) && $categories && $categories->count() > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Categoria</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $cat)
                        @php $isSelected = in_array((string)$cat->id, $selectedCategories); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('category', '{{ $cat->id }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $cat->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(in_array('creator', $extraFilters) && $users && $users->count() > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Creador</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($users as $user)
                        @php $isSelected = in_array((string)$user->id, $selectedCreators); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('creator', '{{ $user->id }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $user->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        @if(in_array('assignee', $extraFilters) && $users && $users->count() > 0)
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Responsable</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($users as $user)
                        @php $isSelected = in_array((string)$user->id, $selectedAssignees); @endphp
                        <button
                            type="button"
                            wire:click="toggleFilter('assignee', '{{ $user->id }}')"
                            @class([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ])
                        >
                            {{ $user->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-ui.bottom-sheet>
