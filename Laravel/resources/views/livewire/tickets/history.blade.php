<div>
  @if($ticket)
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Modified At</th>
          <th class="px-4 py-2">User</th>
          <th class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ticket->histories as $history)
        <tr>
          <td class="border px-4 py-2">
            {{ $history->modified_at }}
          </td>
          <td class="border px-4 py-2">
            {{ $history->user ? $history->user->name : 'Sistem' }}
          </td>
          <td class="border px-4 py-2">
            {{ $history->action }}
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center py-4 text-gray-500">
            No history available
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  @else
  <p class="text-center text-gray-500">Mo ticket selected</p>
  @endif
</div>
