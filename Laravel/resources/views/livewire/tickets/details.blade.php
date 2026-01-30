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
          <select wire:change="assignedToIdUpdate({{ $ticket->id }}, $event.target.value)" class="mt-1 block w-full">
            <option value="">-- Assign User --</option>
            @foreach ($users as $user)
              <option value = "{{ $user->id }}"
                @if($ticket->assigned_to_id == $user->id) 
                selected 
                @endif>
                {{ $user->name }}
              </option>
            @endforeach
          </select>
        </td>
        @endcan
        <td class="border px-4 py-2">
          {{ $ticket->title }}
        </td>
        <td class="border px-4 py-2">
            <span class="block px-3 py-1 rounded-full text-sm font-semibold"
            style="background-color: {{ $ticket->status->color . '20'}}; 
            border: 1px solid {{ $ticket->status->color}}99;">
            {{ ucfirst(str_replace('_', ' ', $ticket->status->name)) }}
            </span>
        </td>
        <td class="border px-4 py-2">
            <span class="px-3 py-1 rounded-full text-sm font-semibold"
            style="background-color: {{ $ticket->priority->colorPriority . '20'}};
            border: 1px solid {{ $ticket->priority->colorPriority}}99;">
              {{ ucfirst(str_replace('_', ' ', $ticket->priority->name)) }}
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
  <div class="col-span-6 sm:col-span-4 px-3 py-3 space-y-6">
      <!-- Ticket Description -->
        <div class="border p-4">
    
              <h2 class="text-lg font-semibold">Description</h2>
              
              <p class="mt-1 block w-full border-gray-300 rounded">
                  {{ $ticket->description }}  
              </p>
    
        </div>
      <div class="grid grid-cols-2 gap-6">

            <!-- Ticket History Comment -->
        <div class="border p-4 max-h-[500px] overflow-y-auto">

          <h2 class="text-lg font-semibold">History Comments</h2>
            @if($ticket->comments->count())
              @foreach($ticket->comments as $comment)
                <div class="mb-4 p-2 border-b">

                  {{ $comment->user->name ?? 'Deleted User' }} : {{ $comment->comment }}
                  <p class="text-sm font-bold px-5 py-1.5">Ticket ID: {{ $comment->ticket_id }} </p>
                  <p class="text-sm font-bold px-5 py-1.5">Ticket Number: {{ $comment->ticket->ticket_number }}</p>
                  <p class="text-sm font-bold px-5 py-1.5">Created At: {{ $comment->created_at }}</p>
                </div>
              @endforeach
                
            @endif
        </div>
              <!-- Ticket Comment -->
        <div class="flex flex-col botder p-4 max-h-[500px]">

          <h2 class="text-lg font-semibold">Comments</h2>
            <div class="px-2.5 py-3 w-full border max-h-64 overflow-y-auto">
              @if($ticket->comments->count())
                @foreach($ticket->comments as $comment)
                  <div class="mb-2">

                    {{ $comment->user->name ?? 'Deleted User' }}: 
                    <span>{{ $comment->comment }}</span>
                  </div>
                @endforeach
              @else
                  <p class="text-gray-500">No comments yet.</p>
              @endif
            </div>
    
            <form wire:submit.prevent="addComment({{ $ticket->id }})" class="mt-4 flex">
              <input type="text" wire:model.defer="newComment" class="flex-1 px-5 py-2.5 border rounded">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded ml-4">Send</button>
            </form>
        </div>
      </div>
          
        
            
    </div>
    
  </div>
    @else
      <p class="text-center text-gray-500">No ticket selected.</p>
    @endif
</div>

