<div>
    <div class="p-4 border rounded-lg bg-gray-50">
    <h3 class="font-semibold text-lg mb-2">Tickets: {{ $user->name }}</h3>

    <div class="flex flex-wrap gap-2 mb-3">
        {{-- Conteo por status --}}
        @foreach($statuses as $status)
            @php
                $statusCount = $user->assignedTo->where('status_id', $status->id)->count();
            @endphp
            <span class="px-3 py-1 rounded-lg font-medium border"
                  style="background-color: {{ $status->color }}50; color:black; border: 1px solid {{ $status->color }}99;">
                {{ $status->name }} ({{ $statusCount }})
            </span>
        @endforeach

        {{-- Conteo por prioridad --}}
        @foreach($priorities as $priority)
            @php
                $priorityCount = $user->assignedTo->where('priority_id', $priority->id)->count();
            @endphp
            <span class="px-3 py-1 rounded-lg font-medium border"
                  style="background-color: {{ $priority->colorPriority }}50; color:black; border: 1px solid {{ $priority->colorPriority }}99;">
                {{ $priority->name }} ({{ $priorityCount }})
            </span>
        @endforeach
    </div>
</div>

</div>
