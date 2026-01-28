<div>
  @php

    $priorities = [
      'low' => 'LOW',
      'medium' => 'MEDIUM',
      'high' => 'HIGH',
      'critical' => 'CRITICAL'
    ];

    $colors = [
      'low' => ['active' => 'bg-gray-800 text-white border-gray-800', 'inactive' => 'bg-green-100 text-green-800'],
      'medium' => ['active' => 'bg-gray-800 text-white border-gray-800', 'inactive' => 'bg-yellow-100 text-yellow-800 border-yellow-300'],
      'high' => ['active' => 'bg-gray-800 text-white border-gray-800', 'inactive' => 'bg-orange-100 text-orange-800 border-orange-300'],
      'critical' => ['active' => 'bg-gray-800 text-white border-gray-800', 'inactive' => 'bg-red-100 text-red-800 border-red-300']
    ];
  @endphp
  
  <div class="flex items-center content-center gap-2 mb-6 ml-4 mt-5">

    @if ($myGroups->isNotEmpty())
      <x-input-label for="groups" value="{{ __('GROUPS') }}" />
      @foreach($myGroups as $group)
        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">{{ $group->name }}</span>
      @endforeach
    @endif
  </div>
  
  
  <div class="flex items-center content-center gap-2 mb-6 ml-4 mt-5">
    <x-input-label for="filterByStatus" value="{{ __('STATUS') }}" />
    <div class="flex flex-wrap gap-2">
      @foreach($statuses as $status)
        <button wire:click="filterByStatus({{ $status->id }})"
          class="text-sm font-medium px-2 py-1 rounded-lg border transition"
          style="background-color: {{ $statusFilter === $status->id ? $status->color :  $status->color . '20' }}; 
          border: 1px solid {{ $status->color }}99;">
          {{ ucfirst(str_replace('_', ' ', $status->name)) }}
        </button>
      @endforeach
    </div>
    
    

    
    <select wire:model.lazy="creationFilter" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-0.5 rounded-lg h-[28px] ">
      <option value="desc">DESC</option>
      <option value="asc">ASC</option>
    </select>
    
    
    <x-text-input
                id="search"
                type="text"
                class="mt-1 block w-[150px]"
                wire:model.live.debounce.300ms="search"
                placeholder='Search...'
                autocomplete="search"
    />
  </div>
  
  
  <div class="flex items-center content-center gap-2 mb-6 ml-4 mt-5">
    <x-input-label for="filterByPriority" value="{{ __('PRIORITY') }}" />
    @foreach ($priorities as $key => $label )
      <button wire:click="filterByPriority('{{ $key }}')" class="text-sm font-medium px-1.5 py-0.5 rounded-lg border {{ $statusPriority === $key ? $colors[$key]['active'] : $colors[$key]['inactive'] }}">{{ $label }}</button>
    @endforeach
    <button wire:click="clearFilters"
        class="px-1.5 py-0.5 bg-red-600 text-white rounded-lg ml-4">
        CLEAR
    </button>

  </div>
  
  <table class="table-auto w-full">
        
        <thead>
            <tr>
                <th class="px-4 py-2">Ticket Number</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            
                <tr>
                    <td class="border px-4 py-2">{{ sprintf('TCK-%04d', $ticket->ticket_number) }}</td>
                    <td class="border px-4 py-2">{{ $ticket->title }}</td>
                    <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown({{ $ticket->id }})"
                      class="px-3 py-1 rounded-full text-sm font-semibold"
                      style="background-color: {{ $ticket->status->color}}20; color: black; border: 1px solid {{ $ticket->status->color}}99; ">
                      {{ ucfirst(str_replace('_', ' ', $ticket->status->name)) }}
                      </button>
                    <!--Dropdown-->
                    @if($openStatusDropdown === $ticket->id)
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      @foreach ($statuses as $status)
                      <button wire:click="changeStatus({{ $ticket->id }}, '{{ $status->id }}')"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                        style="background-color: {{ $status->color }}10; color: {{ $status->color }};" >
                        
                        {{ ucfirst(str_replace('_', ' ', $status->name)) }}
                      </button>
                      
                      @endforeach
                      
                    </div>
                    @endif
                  </td>
                  <td class="border px-4 py-2"><button wire:click="togglePriorityDropdown({{ $ticket->id }})" 
                    class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ match($ticket->priority) {
                          'low' => 'bg-green-100 text-green-800',
                          'medium' => 'bg-yellow-100 text-yellow-800',
                          'high' => 'bg-orange-100 text-orange-800',
                          'critical' => 'bg-red-100 text-red-800',
                    } }}">
                      {{ ucfirst(str_replace('_', ' ', $ticket->priority)) }}
                    </button>
                    <!--Dropdown-->
                      @if($openPriorityDropdown === $ticket->id)
                      <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                        @foreach (['low', 'medium', 'high', 'critical'] as $priority)
                          <button wire:click="changePriority({{ $ticket->id }}, '{{ $priority }}')"
                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100
                            {{ match($ticket->priority) {
                          'low' => 'bg-green-100 text-green-800',
                          'medium' => 'bg-yellow-100 text-yellow-800',
                          'high' => 'bg-orange-100 text-orange-800',
                          'critical' => 'bg-red-100 text-red-800',
                    } }}">
                            {{ ucfirst(str_replace('_', ' ', $priority)) }}
                          </button>
                        @endforeach
                      </div>
                    @endif
                    </td>
                    <td class="border px-4 py-2">{{ $ticket->created_at }}
                      @can('delete', $ticket)
                      <button wire:click="deleteTicket({{ $ticket->id }})"
                        class="inline-block px-4 py-2 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    @endcan
                    <a href="{{ route('details', $ticket->ticket_number) }}"
                      class="inline-block px-4 py-2 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            @endforeach
            
        </tbody>
      </table>
      <div class="flex justify-center items-center mb-6 ml-4 mt-5">
        {{ $tickets->links('vendor.pagination.tailwind') }}
      </div>

    
    
</div>
