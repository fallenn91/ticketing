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
                    <td class="border px-4 py-2"><select wire:change="changeStatus({{ $ticket->id }}, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded
                                                              {{ match($ticket->status) {
                                                              'open' => 'bg-gray-100 text-gray-800',
                                                    'in_process' => 'bg-blue-100 text-blue-800',
                                                    'resolved' => 'bg-green-100 text-green-800',
                                                    'closed' => 'bg-red-300 text-red-800',
                                                    default => 'bg-white text-black',
                                                } }}"
                                                >
                                                  @foreach (['open', 'in_process', 'resolved', 'closed'] as $status)
                                                    <option value="{{ $status }}">{{ $ticket->status === $status ? '' : '' }}
                                                      {{ ucfirst($status) }}
                                                    </option>
                                                  @endforeach
                                                </select></td>
                    <td class="border px-4 py-2"><select wire:change="changePriority({{ $ticket->id }}, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded
                      {{ match($ticket->priority) {
            'low' => 'bg-green-100 text-green-800',
            'medium' => 'bg-yellow-100 text-yellow-800',
            'high' => 'bg-orange-100 text-orange-800',
            'critical' => 'bg-red-100 text-red-800',
            default => 'bg-white text-black',
        } }}">
                                                  @foreach (['low', 'medium', 'high', 'critical'] as $priority)
                                                    <option value="{{ $priority }}">{{ $ticket->priority === $priority ? '' : '' }}
                                                      {{ ucfirst($priority) }} <!--Change uppercase first letter-->
                                                    </option>
                                                  @endforeach
                                                </select></td>
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
