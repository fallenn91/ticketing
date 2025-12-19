<div>
    <div class="sm:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card class="!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft">
                <div class="px-4 py-4 sm:p-6">
                    {{-- Configurable header --}}
                    <x-tickets-header
                        :title="$title"
                        :total="$tickets->total()"
                        :showStats="$showStats"
                        :stats="$stats ?? []"
                        :status="$status"
                    />

                    {{-- Calculate secondary filters count for "Mas filtros" badge --}}
                    @php
                        $secondaryFiltersCount = count($type ?? []) + count($category ?? []) + count($creator ?? []) + count($assignee ?? []);
                    @endphp

                    {{-- Filter bar --}}
                    <x-filter-bar
                        :activeFilters="$this->activeFilters"
                        clearMethod="clearFilters"
                        :statuses="$statuses"
                        :priorities="$priorities"
                        :deadlineOptions="$deadlineOptions"
                        :status="$status"
                        :priority="$priority"
                        :deadline="$deadline"
                        :extraFilters="$extraFilters ?? []"
                        :types="$types ?? []"
                        :categories="$categories ?? collect()"
                        :users="$users ?? collect()"
                        :type="$type ?? []"
                        :category="$category ?? []"
                        :creator="$creator ?? []"
                        :assignee="$assignee ?? []"
                        :stats="$stats ?? []"
                        :sortField="$sortField"
                        :sortDirection="$sortDirection"
                        :sortFields="\App\Models\Ticket::SORT_FIELDS"
                    >
                        <x-slot name="search">
                            <x-search-input placeholder="Buscar por titulo o ID..." />
                        </x-slot>

                        {{-- Basic filters (always shown) --}}
                        <x-filter-chip label="Estado" :options="$statuses" wireModel="status" :value="$status" />
                        <x-filter-chip label="Prioridad" :options="$priorities" wireModel="priority" :value="$priority" />
                        <x-filter-chip label="Fecha limite" :options="$deadlineOptions" wireModel="deadline" :value="$deadline" />

                        {{-- Extra filters (only for admin) --}}
                        @if(!empty($extraFilters ?? []))
                            <x-filter-dropdown label="Mas filtros" :activeCount="$secondaryFiltersCount">
                                @if(in_array('type', $extraFilters ?? []))
                                    <x-filter-chip label="Tipo" :options="$types ?? []" wireModel="type" :value="$type ?? []" />
                                @endif
                                @if(in_array('category', $extraFilters ?? []))
                                    <x-filter-chip label="Categoria" :options="($categories ?? collect())->pluck('name', 'id')->toArray()" wireModel="category" :value="$category ?? []" />
                                @endif
                                @if(in_array('creator', $extraFilters ?? []))
                                    <x-filter-chip label="Creador" :options="($users ?? collect())->pluck('name', 'id')->toArray()" wireModel="creator" :value="$creator ?? []" />
                                @endif
                                @if(in_array('assignee', $extraFilters ?? []))
                                    <x-filter-chip label="Responsable" :options="($users ?? collect())->pluck('name', 'id')->toArray()" wireModel="assignee" :value="$assignee ?? []" />
                                @endif
                            </x-filter-dropdown>
                        @endif
                    </x-filter-bar>

                    {{-- Desktop table --}}
                    <x-tickets-table
                        :tickets="$tickets"
                        :showCreator="in_array('creator', $extraFilters ?? [])"
                        :sortField="$sortField"
                        :sortDirection="$sortDirection"
                        :interactive="$interactive ?? false"
                    >
                        <x-slot:empty>
                            <x-empty-state
                                icon="ticket"
                                :title="$emptyMessage ?? 'No hay tickets'"
                                :description="($emptyAction ?? false) ? 'Crea tu primer ticket para empezar.' : 'No se encontraron tickets con los filtros aplicados.'"
                            >
                                @if($emptyAction ?? false)
                                    <x-ui.new-ticket-button />
                                @endif
                            </x-empty-state>
                        </x-slot:empty>
                    </x-tickets-table>

                    {{-- Mobile list --}}
                    <x-tickets-mobile-list :tickets="$tickets" :fromAdmin="$interactive ?? false" />

                    {{-- Pagination --}}
                    @if($tickets->hasPages())
                        <div class="mt-6">
                            {{ $tickets->links() }}
                        </div>
                    @endif
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
