<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-2 mb-3">
          @foreach($statuses as $status)
            <span class="px-3 py-1 rounded-lg font-medium border"
            style="background-color: {{ $status->color }}50; color:black; border: 1px solid {{ $status->color }}99;">
            {{ $status->name }} ({{ $tickets->where('status_id', $status->id)->count() }})
            </span>
          @endforeach
          @foreach($priorities as $priority)
            <span class="px-3 py-1 rounded-lg font-medium border"
            style="background-color: {{ $priority->colorPriority }}50; color:black; border: 1px solid {{ $priority->colorPriority }}99;">
            {{ $priority->name }} ({{ $tickets->where('status_id', $priority->id)->count() }})
            </span>
          @endforeach
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
            <livewire:tickets.show :show-filters="true" :show-priority="true" />
        </div>
        </div>
    </div>
</x-app-layout>