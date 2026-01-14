
  <div>
    @if($ticket)
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Ticket Number</th>
          <th class="px-4 py-2">Created By</th>
          @can('viewAny', App\Models\Ticket::class)
          <th class="px-4 py-2">Assigned To</th>
          @endcan
          <th class="px-4 py-2">Title</th>
          
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Priority</th>
          <th class="px-4 py-2">Category</th>
          <th class="px-4 py-2">Created</th>
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
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                  {{ match($ticket->status) {
                      'open' => 'bg-gray-100 text-gray-800 border border-gray-300',
                      'in_process' => 'bg-blue-100 text-blue-800 border border-blue-300',
                      'resolved' => 'bg-green-100 text-green-800 border border-green-300',
                      'closed' => 'bg-red-100 text-red-800 border border-red-300',
                      default => 'bg-gray-100 text-gray-800 border border-gray-300',
                  } }}">
                  {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                </span>
              </td>
              <td class="border px-4 py-2">
                 <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ match($ticket->priority) {
                        'low' => 'bg-green-100 text-green-800 border border-green-300',
                        'medium' => 'bg-yellow-100 text-yellow-800 border border-yellow-300',
                        'high' => 'bg-orange-100 text-orange-800 border border-orange-300',
                        'critical' => 'bg-red-100 text-red-800 border border-red-300',
                        default => 'bg-gray-100 text-gray-800 border border-gray-300',
                    } }}">
                    {{ ucfirst(str_replace('_', ' ', $ticket->priority)) }}
                  </span>
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
@if($ticket->comments->count())
    @foreach($ticket->comments as $comment)
        {{ $comment->user->name ?? 'Deleted User' }}: {{ $comment->comment }}
    @endforeach
@endif


              
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

