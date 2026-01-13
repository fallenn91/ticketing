
  <div>
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Ticket Number</th>
          <th class="px-4 py-2">User Name</th>
          @can('viewAny', App\Models\Ticket::class)
          <th class="px-4 py-2">Assigned To</th>
          @endcan
          <th class="px-4 py-2">Title</th>
          
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Priority</th>
          <th class="px-4 py-2">Category</th>
          <th class="px-4 py-2">Created At</th>
        </tr>
      </thead>
      <tbody>
          
            <tr>
              <td class="border px-4 py-2">
                {{ sprintf('TCK-%04d', $ticket->ticket_number) }}
              </td>
              <td class="border px-4 py-2">
                {{ $ticket->user_id ? $ticket->user->name : 'Deleted User' }}
              </td>
              @can('viewAny', App\Models\Ticket::class)
              <td class="border px-4 py-2">
                {{ $ticket->assigned_to_id ? $ticket->assignedTo->name : 'Unassigned' }}
              </td>
              @endcan
              <td class="border px-4 py-2">
                {{ $ticket->title }}
              </td>
              <td class="border px-4 py-2">
                {{ $ticket->status }}
              </td>
              <td class="border px-4 py-2">
                {{ $ticket->priority }}
              </td>
              <td class="border px-4 py-2">
                {{ $ticket->category->name ?? 'Uncategorized' }}
              </td>
              <td class="border px-4 py-2">
                {{ $ticket->created_at }}
              </td>
            </tr>
           
        </tbody>
    </table>
</div>

