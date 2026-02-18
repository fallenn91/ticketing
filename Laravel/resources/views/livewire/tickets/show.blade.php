<div>
  @include('livewire.tickets.filters')
  <table class="table-auto w-full" >
        
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
                    <td class="border px-4 py-2">{{ sprintf('TCK-%04d', $ticket->ticket_number) }}
                      @if ($ticket->group)
                      <span class="inline-block border border-black px-2 py-1 rounded-lg text-sm ml-4">
                        {{ $ticket->group->name }}
                      </span>
                      @endif
                    </td>
                    <td class="border px-4 py-2">{{ $ticket->title }}</td>
                    <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown({{ $ticket->id }})"
                      class="px-3 py-1 rounded-full text-sm font-semibold"
                      style="background-color: {{ $ticket->status->color}}20; color: black; border: 1px solid {{ $ticket->status->color}}99; ">
                      {{ ucfirst(str_replace('_', ' ', $ticket->status->name)) }}
                      </button>

                    <!--Dropdown-->
                    @if($openStatusDropdowns[$ticket->id] ?? false)
                    <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
                      @foreach ($statuses as $status)
                      <button wire:click="changeStatus({{ $ticket->id }}, {{ $status->id }})"
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
                      @if($openPriorityDropdowns[$ticket->id] ?? false)
                      <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
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
                        class="inline-block px-4 py-2 bg-red-500 hover:bg-red-700 transition-colors duration-200 text-white rounded-lg ml-4"
                        >
                        Delete
                      </button>
                    @endcan
                    <a href="{{ route('details', $ticket->ticket_number) }}"
                      class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 transition-colors duration-200 text-white rounded-lg ml-4">
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