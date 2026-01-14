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
                    <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown({{ $ticket->id }})"
                      class="px-3 py-1 rounded-full text-sm font-semibold 
                      {{  match($ticket->status) {
                            'open' => 'bg-gray-100 text-gray-800',
                            'in_process' => 'bg-blue-100 text-blue-800',
                            'resolved' => 'bg-green-100 text-green-800',
                            'closed' => 'bg-red-100 text-red-800',
                      } }}">
                      {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                      </button>
                    <!--Dropdown-->
                    @if($openStatusDropdown === $ticket->id)
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      @foreach (['open', 'in_process', 'resolved', 'closed'] as $status)
                      <button wire:click="changeStatus({{ $ticket->id }}, '{{ $status }}')"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100
                        {{  match($ticket->status) {
                            'open' => 'bg-gray-100 text-gray-800',
                            'in_process' => 'bg-blue-100 text-blue-800',
                            'resolved' => 'bg-green-100 text-green-800',
                            'closed' => 'bg-red-100 text-red-800',
                      } }}">
                        
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
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
                        class="px-4 py-2 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    @endcan
                    <a href="{{ route('details', $ticket->ticket_number) }}"
                      class="px-4 py-2 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
