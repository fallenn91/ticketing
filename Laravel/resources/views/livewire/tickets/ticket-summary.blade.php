<div>
    <div class="p-4 border rounded-lg shadow-lg bg-white mb-5">
      <div class="flex items-center content-center gap-2 mb-5">
        @if ($myGroups->isNotEmpty())
          <x-input-label for="groups" value="{{ __('GROUPS') }}" />
          @foreach($myGroups as $group)
            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">{{ $group->name }}</span>
          @endforeach
        @endif
      </div>
      <h3 class="font-semibold text-lg mb-2">Tickets: {{ $user->name }}</h3>

      <div class="flex flex-wrap gap-2 mb-3">
          {{-- Status Count --}}
          @foreach($statuses as $status)
              @php
                  $statusCount = $user->tickets->where('status_id', $status->id)->count();
              @endphp
              <span class="px-3 py-1 rounded-lg font-medium border"
                    style="background-color: {{ $status->color }}50; color:black; border: 1px solid {{ $status->color }}99;">
                  {{ $status->name }} ({{ $statusCount }})
              </span>
          @endforeach

          {{-- Prioroity Count --}}
          @foreach($priorities as $priority)
              @php
                  $priorityCount = $user->tickets->where('priority_id', $priority->id)->count();
              @endphp
              <span class="px-3 py-1 rounded-lg font-medium border"
                    style="background-color: {{ $priority->colorPriority }}50; color:black; border: 1px solid {{ $priority->colorPriority }}99;">
                  {{ $priority->name }} ({{ $priorityCount }})
              </span>
          @endforeach
      </div>
    </div>
</div>
