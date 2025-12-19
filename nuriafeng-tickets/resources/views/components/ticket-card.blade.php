@props(['ticket', 'fromAdmin' => false])

<a href="{{ route('tickets.show', $ticket) }}{{ $fromAdmin ? '?from=admin' : '' }}"
   class="block bg-surface border border-border rounded-lg shadow-soft dark:shadow-dark-soft p-3 hover:shadow-medium hover:border-accent/30 transition-all duration-200 group">

    {{-- Row 1: ID + Title | Badges + Created time --}}
    <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-2 min-w-0 flex-1">
            <span class="text-xs font-mono text-content-muted shrink-0">#{{ $ticket->id }}</span>
            <h3 class="font-semibold text-sm text-content truncate group-hover:text-accent transition-colors">
                {{ $ticket->title }}
            </h3>
        </div>
        <div class="flex items-center gap-1.5 shrink-0">
            <x-ticket-type-badge :type="$ticket->type" size="icon" />
            <x-status-badge :status="$ticket->status" size="icon" />
            <x-priority-badge :priority="$ticket->priority" size="icon" />
            <x-relative-time :date="$ticket->created_at" :short="true" class="text-xs text-content-muted ml-1" />
        </div>
    </div>

    {{-- Row 2: Description (truncated to 1 line) --}}
    <p class="mt-1.5 text-xs text-content-secondary line-clamp-1">
        {{ $ticket->description }}
    </p>

    {{-- Row 3: Category + Assignee | Updated time --}}
    <div class="flex items-center justify-between gap-3 mt-2 text-xs text-content-muted">
        <div class="flex items-center gap-3">
            @if($ticket->category)
            <span class="inline-flex items-center gap-1">
                <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                {{ $ticket->category->name }}
            </span>
            @endif

            @if($ticket->assignee)
            <span class="inline-flex items-center gap-1">
                <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ $ticket->assignee->name }}
            </span>
            @endif

            @if($ticket->deadline)
            <span @class([
                'inline-flex items-center gap-1',
                'text-red-500 font-medium' => $ticket->isOverdue(),
                'text-amber-500' => !$ticket->isOverdue() && $ticket->isNearDeadline(),
            ])>
                <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $ticket->deadline->format('d/m') }}
            </span>
            @endif
        </div>

        @if($ticket->updated_at->gt($ticket->created_at->addMinutes(1)))
        <span class="inline-flex items-center gap-1" title="Modificado">
            <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <x-relative-time :date="$ticket->updated_at" :short="true" />
        </span>
        @endif
    </div>
</a>
