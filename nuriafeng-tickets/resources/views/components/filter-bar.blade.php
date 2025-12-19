@props([
    'activeFilters' => [],
    'clearMethod' => 'clearFilters',
    'statuses' => [],
    'priorities' => [],
    'deadlineOptions' => [],
    'status' => [],
    'priority' => [],
    'deadline' => [],
    // Extra filters for admin view:
    'extraFilters' => [],
    'types' => [],
    'categories' => null,  // Collection
    'users' => null,       // Collection
    'type' => [],
    'category' => [],
    'creator' => [],
    'assignee' => [],
    // Stats for mobile compact display:
    'stats' => [],
    // Sorting props:
    'sortField' => 'created_at',
    'sortDirection' => 'desc',
    'sortFields' => [],
])

@php
    $hasActiveFilters = count($activeFilters) > 0;
    $activeFilterCount = count($activeFilters);
@endphp

<div class="mb-6 space-y-3">
    <div class="flex flex-col lg:flex-row lg:items-center gap-3">
        {{-- Mobile: Search con filter integrado --}}
        <div class="md:hidden relative"
             x-data="{ focused: false, hasValue: false }"
             x-init="hasValue = $refs.searchInput?.value?.length > 0">
            <div @class([
                'flex items-center bg-surface border rounded-lg transition-all duration-200',
                'border-border focus-within:ring-2 focus-within:ring-accent/20 focus-within:border-accent',
            ])>
                {{-- Search icon --}}
                <div class="pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-content-muted transition-all duration-200"
                         :class="focused && 'text-accent scale-110'"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                {{-- Input --}}
                <input
                    x-ref="searchInput"
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Buscar por titulo o ID..."
                    @focusin="focused = true"
                    @focusout="focused = false"
                    @input="hasValue = $event.target.value.length > 0"
                    class="flex-1 min-w-0 px-2 py-2.5 bg-transparent border-none text-sm text-content
                           placeholder:text-content-muted
                           focus:outline-none focus:ring-0"
                />

                {{-- Loading spinner --}}
                <div wire:loading wire:target="search" class="pr-1">
                    <svg class="w-4 h-4 text-accent animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                    </svg>
                </div>

                {{-- Clear button --}}
                <button
                    type="button"
                    x-show="hasValue"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-75"
                    @click="$refs.searchInput.value = ''; $refs.searchInput.dispatchEvent(new Event('input')); hasValue = false"
                    class="p-1 mr-1 rounded-full text-content-muted hover:text-content hover:bg-surface-tertiary
                           transition-colors duration-150"
                    wire:loading.class="hidden"
                    wire:target="search"
                    x-cloak
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Divider --}}
                <div class="h-6 w-px bg-border/40 shrink-0"></div>

                {{-- Filter button --}}
                <button
                    type="button"
                    @click="$dispatch('open-filter-sheet')"
                    @class([
                        'flex items-center gap-1.5 px-3 py-2.5 rounded-r-lg shrink-0',
                        'hover:bg-surface-tertiary active:scale-[0.95] transition-all duration-150',
                        'text-accent' => $activeFilterCount > 0,
                        'text-content-muted hover:text-content' => $activeFilterCount === 0,
                    ])
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    @if($activeFilterCount > 0)
                        <span class="inline-flex items-center justify-center min-w-[18px] h-[18px] px-1 text-xs font-semibold bg-accent text-white rounded-full">
                            {{ $activeFilterCount }}
                        </span>
                    @endif
                </button>
            </div>
        </div>

        {{-- Desktop: Original search slot --}}
        @if(isset($search))
            <div class="hidden md:block w-full lg:w-64 xl:w-72 shrink-0">
                {{ $search }}
            </div>
        @endif

        {{-- Mobile: Bottom sheet (solo modal, trigger oculto porque está integrado arriba) --}}
        <x-filter-bottom-sheet
            :statuses="$statuses"
            :priorities="$priorities"
            :deadlineOptions="$deadlineOptions"
            :status="$status"
            :priority="$priority"
            :deadline="$deadline"
            :activeFilterCount="$activeFilterCount"
            :extraFilters="$extraFilters"
            :types="$types"
            :categories="$categories"
            :users="$users"
            :type="$type"
            :category="$category"
            :creator="$creator"
            :assignee="$assignee"
            :showTrigger="false"
            :sortField="$sortField"
            :sortDirection="$sortDirection"
            :sortFields="$sortFields"
        />

        <div class="hidden md:block relative flex-1 min-w-0"
             x-data="{
                 canScrollLeft: false,
                 canScrollRight: true,
                 updateScrollIndicators() {
                     this.canScrollLeft = this.$refs.scrollContainer.scrollLeft > 10;
                     this.canScrollRight = this.$refs.scrollContainer.scrollLeft <
                         (this.$refs.scrollContainer.scrollWidth - this.$refs.scrollContainer.clientWidth - 10);
                 }
             }"
             x-init="$nextTick(() => updateScrollIndicators())"
             @resize.window="updateScrollIndicators()">

            {{-- Gradiente izquierdo --}}
            <div x-show="canScrollLeft"
                 x-transition:enter="transition-opacity duration-200"
                 class="md:hidden absolute left-0 top-0 bottom-0 w-8
                        bg-gradient-to-r from-background to-transparent
                        pointer-events-none z-10">
            </div>

            <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide px-1 -mx-1"
                 x-ref="scrollContainer"
                 @scroll="updateScrollIndicators()">
                {{ $slot }}

                @if($hasActiveFilters)
                    <div class="w-px h-5 bg-border/30 shrink-0"></div>
                    <button
                        type="button"
                        wire:click="{{ $clearMethod }}"
                        class="group inline-flex items-center justify-center w-7 h-7 shrink-0 rounded-full
                               bg-surface-tertiary/50 border border-border/50
                               text-content-muted hover:text-accent hover:border-accent/50 hover:bg-accent/10
                               transition-all duration-200"
                        title="Limpiar todos los filtros"
                    >
                        <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:scale-110"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Gradiente derecho --}}
            <div x-show="canScrollRight"
                 x-transition:enter="transition-opacity duration-200"
                 class="md:hidden absolute right-0 top-0 bottom-0 w-8
                        bg-gradient-to-l from-background to-transparent
                        pointer-events-none z-10">
            </div>
        </div>
    </div>

    @if($hasActiveFilters)
        <div class="flex flex-wrap items-center gap-2">
            @foreach($activeFilters as $filter)
                <span class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 text-xs font-medium
                             bg-surface-tertiary text-content-secondary rounded-full border border-border/50">
                    {{ $filter['label'] }}
                    <button
                        type="button"
                        wire:click="removeFilter('{{ $filter['field'] }}', '{{ $filter['value'] }}')"
                        class="p-0.5 rounded-full hover:bg-surface-secondary hover:text-content transition-colors"
                        title="Quitar filtro"
                    >
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
    @endif
</div>
