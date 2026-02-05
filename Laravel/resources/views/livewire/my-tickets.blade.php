<div>
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
                <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown({{ $ticket->id }})" class="px-3 py-1 rounded-full text-sm font-semibold"
                style="background-color: {{ $ticket->status->color}}20; color:black; border: 1px solid {{ $ticket->status->color }}99;"> 
                {{ ucfirst(str_replace('_', ' ', $ticket->status->name)) }}</button>
              @if($openStatusDropdown === $ticket->id)
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
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
                <td class="border px-4 py-2">
                  <button wire:click="togglePriorityDropdown({{ $ticket->id }}) " class="px-3 py-1 rounded-full text-sm font-semibold"
                    style="background-color: {{ $ticket->priority->colorPriority}}20; color:black; border: 1px solid {{ $ticket->priority->colorPriority }}99;"> 
                    {{ ucfirst(str_replace('_', ' ', $ticket->priority->name)) }}
                  </button>
              
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
                
                <td class="border px-4 py-2">{{ $ticket->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
