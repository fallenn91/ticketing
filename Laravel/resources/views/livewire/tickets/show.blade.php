<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td class="border px-4 py-2">{{ $ticket->id }}</td>
                    <td class="border px-4 py-2">{{ $ticket->title }}</td>
                    <td class="border px-4 py-2"><select wire:model="status" class="mt-1 block w-full border-gray-300 rounded">
                                                  <option value="in_process">In Process</option>
                                                  <option value="resolved">Resolved</option>
                                                  <option value="closed">Closed</option>
                                                </select></td>
                    <td class="border px-4 py-2"><select wire:model="priority" class="mt-1 block w-full border-gray-300 rounded">
                                                  <option value="low">Low</option>
                                                  <option value="medium">Medium</option>
                                                  <option value="high">High</option>
                                                  <option value="critical">Critical</option>
                                                </select></td>
                    <td class="border px-4 py-2">{{ $ticket->created_at }}
                      @can('delete', $ticket)
                      <button wire:click="delete({{ $ticket->id }})"
                        class="px-2 py-1 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
