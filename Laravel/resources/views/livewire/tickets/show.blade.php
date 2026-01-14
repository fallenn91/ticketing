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
                    <td class="border px-4 py-2"><select wire:change="changeStatus({{ $ticket->id }}, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded">
                                                  @foreach (['in_process', 'resolved', 'closed'] as $status)
                                                    <option value="{{ $status }}">{{ $ticket->status === $status ? '' : '' }}
                                                      {{ ucfirst($status) }}
                                                    </option>
                                                  @endforeach
                                                </select></td>
                    <td class="border px-4 py-2"><select wire:change="changePriority({{ $ticket->id }}, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded">
                                                  @foreach (['low', 'medium', 'high', 'critical'] as $priority)
                                                    <option value="{{ $priority }}">{{ $ticket->priority === $priority ? '' : '' }}
                                                      {{ ucfirst($priority) }} <!--Change uppercase first letter-->
                                                    </option>
                                                  @endforeach
                                                </select></td>
                    <td class="border px-4 py-2">{{ $ticket->created_at }}
                      @can('delete', $ticket)
                      <button wire:click="deleteTicket({{ $ticket->id }})"
                        class="px-2 py-1 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    @endcan
                    <a href="{{ route('details', $ticket->ticket_number) }}"
                      class="px-2 py-1 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
  window.addEventListener('ticketUpdated', event => {
      Livewire.emit('refreshTicket', event.detail);
  });
</script>
