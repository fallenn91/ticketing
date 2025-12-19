@props([
    'tickets',
    'showCreator' => false,
    'showAssignee' => true,
    'sortField' => null,
    'sortDirection' => 'asc',
    'interactive' => false,
])

<div class="hidden md:block overflow-x-auto rounded-lg border border-border">
    <table class="min-w-full divide-y divide-border">
        <thead class="sticky top-0 z-10">
            <tr>
                <x-table-header field="id" :sortField="$sortField" :sortDirection="$sortDirection">ID</x-table-header>
                <x-table-header field="title" :sortField="$sortField" :sortDirection="$sortDirection">Titulo</x-table-header>
                @if($showCreator)
                    <x-table-header :sortable="false">Creador</x-table-header>
                @endif
                <x-table-header field="type" :sortField="$sortField" :sortDirection="$sortDirection">Tipo</x-table-header>
                @if(!$showCreator)
                    <x-table-header :sortable="false">Categoria</x-table-header>
                @endif
                <x-table-header field="status" :sortField="$sortField" :sortDirection="$sortDirection">Estado</x-table-header>
                <x-table-header field="priority" :sortField="$sortField" :sortDirection="$sortDirection" class="whitespace-nowrap">Prioridad</x-table-header>
                @if($showAssignee)
                    <x-table-header :sortable="false">Responsable</x-table-header>
                @endif
                <x-table-header field="updated_at" :sortField="$sortField" :sortDirection="$sortDirection">Actualizado</x-table-header>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            @forelse($tickets as $ticket)
                <tr class="odd:bg-surface-secondary/30 hover:bg-accent/5 dark:hover:bg-accent/10 transition-colors duration-150">
                    @php $ticketUrl = route('tickets.show', $ticket) . ($interactive ? '?from=admin' : ''); @endphp
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap font-mono">
                        <a href="{{ $ticketUrl }}" class="text-content-muted hover:text-accent transition-colors">
                            #{{ $ticket->id }}
                        </a>
                    </td>
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap font-medium">
                        <a href="{{ $ticketUrl }}" class="text-content hover:text-accent transition-colors">
                            {{ Str::limit($ticket->title, $showCreator ? 35 : 40) }}
                        </a>
                    </td>
                    @if($showCreator)
                        <td class="px-3 py-3.5 text-sm whitespace-nowrap text-content-secondary">
                            {{ $ticket->creator->name }}
                        </td>
                    @endif
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap">
                        <x-ticket-type-badge :type="$ticket->type" />
                    </td>
                    @if(!$showCreator)
                        <td class="px-3 py-3.5 text-sm whitespace-nowrap text-content-secondary">
                            {{ $ticket->category?->name ?? '-' }}
                        </td>
                    @endif
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap overflow-visible">
                        <x-status-badge
                            :status="$ticket->status"
                            :interactive="$interactive"
                            :ticketId="$interactive ? $ticket->id : null"
                        />
                    </td>
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap overflow-visible">
                        <x-priority-badge
                            :priority="$ticket->priority"
                            :interactive="$interactive"
                            :ticketId="$interactive ? $ticket->id : null"
                        />
                    </td>
                    @if($showAssignee)
                        <td class="px-3 py-3.5 text-sm whitespace-nowrap text-content-secondary">
                            {{ $ticket->assignee?->name ?? '-' }}
                        </td>
                    @endif
                    <td class="px-3 py-3.5 text-sm whitespace-nowrap text-content-muted">
                        <x-relative-time :date="$ticket->updated_at" wire:key="time-{{ $ticket->id }}-{{ $ticket->updated_at->timestamp }}" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ 6 + ($showCreator ? 1 : 1) + ($showAssignee ? 1 : 0) }}">
                        {{ $empty ?? '' }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
