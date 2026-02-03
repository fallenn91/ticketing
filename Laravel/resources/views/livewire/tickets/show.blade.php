<div>
  
  <div class="flex items-center content-center gap-2 mb-3 ml-4 mt-5">
    @if ($myGroups->isNotEmpty())
      <x-input-label for="groups" value="{{ __('GROUPS') }}" />
      @foreach($myGroups as $group)
        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">{{ $group->name }}</span>
      @endforeach
    @endif
  </div>
  
  
  <div class="relative inline-block ml-4 mb-6 mt-4">
    <button type="button" wire:click="$toggle('openStatusDropdown')"
      class="px-3 py-1 rounded-lg font-medium border"
      style="background-color: {{ $statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'}}20;
      border: 1px solid {{ $statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'}}99;">
      
        {{ $statusFilter ? ucfirst(str_replace('_', ' ', $statuses->firstWhere('id', $statusFilter)->name)) : 'Status'}}
    </button>

    @if($openStatusDropdown)
      <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
        @foreach ($statuses as $status)
          <button wire:click="filterByStatus({{ $status->id }})"
              class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
              style="background-color: {{ $status->color }}50; color: black;">
              {{ $status->name }}
          </button>
        @endforeach
      </div>
    @endif

  

    <button type="button" wire:click="$toggle('openPriorityDropdown')"
      class="px-3 py-1 rounded-lg font-medium border"
      style="background-color: {{ $statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'}}20;
      border: 1px solid {{ $statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'}}99;">
      
        {{ $statusPriority ? ucfirst(str_replace('_', ' ', $priorities->firstWhere('id', $statusPriority)->name)) : 'Priority'}}
    </button>

  @if($openPriorityDropdown)
    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
      @foreach ($priorities as $priority)
        <button wire:click="filterByPriority({{ $priority->id }})"
            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
            style="background-color: {{ $priority->colorPriority }}50; color: black;">
            {{ $priority->name }}
        </button>
      @endforeach
    </div>
  @endif

    
    <select wire:model.lazy="creationFilter" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-0.5 rounded-lg h-[28px] ">
      <option value="desc">DESC</option>
      <option value="asc">ASC</option>
    </select>
    
    <select wire:model.lazy="creationUser" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-0.5 rounded-lg h-[28px] ">
      <option value = "">All</option>

      @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach
    </select>

    

    <button wire:click="clearFilters"
            class="px-1.5 py-0.5 bg-red-600 text-white rounded-lg mt-4">
            CLEAR
    </button>
  
    <x-text-input
      id="search"
      type="text"
      class="mt-4 block w-[150px]"
      wire:model.live.debounce.300ms="search"
      placeholder='Search...'
      autocomplete="search"
    />
  
    

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
                        style="background-color: {{ $status->color }}50; color: black;" >
                        
                        {{ ucfirst(str_replace('_', ' ', $status->name)) }}
                      </button>
                      
                      @endforeach
                      
                    </div>
                    @endif
                  </td>
                  <td class="border px-4 py-2"><button wire:click="togglePriorityDropdown({{ $ticket->id }})" 
                    class="px-3 py-1 rounded-full text-sm font-semibold"
                    style="background-color: {{ $ticket->priority->colorPriority }}20; color: black;
                    border: 1px solid {{ $ticket->priority->colorPriority}}99; ">
                      {{ ucfirst(str_replace('_', ' ', $ticket->priority->name)) }}
                    </button>

                    <!--Dropdown-->
                      @if($openPriorityDropdown === $ticket->id)
                      <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                        @foreach ($priorities as $priority)
                          <button wire:click="changePriority({{ $ticket->id }}, '{{ $priority->id }}')"
                          class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                            style="background-color: {{ $priority->colorPriority }}50; color: black;" >
                            {{ ucfirst(str_replace('_', ' ', $priority->name)) }}
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
