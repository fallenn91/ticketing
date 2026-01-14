
  <div>
    @if($ticket)
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
    
        <div class="col-span-6 sm:col-span-4">
          
          <!-- Ticket Comment -->
            <h2 class="text-lg font-semibold">Comments</h2>

            @forelse($ticket->comments as $comment)
                <div class="mt-2 p-2 border border-gray-300 rounded">
                    <p class="text-sm text-gray-600">
                        <strong>{{ $comment->userComment->name ?? 'Deleted User' }}</strong> commented:
                    </p>
                    <p class="mt-1">{!! nl2br(e($comment->comment)) !!}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $comment->created_at->format('d/m/Y H:i') }}</p>
                </div>
            @empty
                <p class="mt-1 block w-full border border-gray-300 rounded p-2">No comments available.</p>
            @endforelse

              
                <!-- Ticket Description -->
                <h2 class="text-lg font-semibold">Description</h2>
                
            <p class="mt-1 block w-full border-gray-300 rounded">
                {{ $ticket->description }}  
            </p>
            
        </div>
    
  </div>
    @else
      <p class="text-center text-gray-500">No ticket selected.</p>
    @endif
</div>

