
  <div>
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Ticket Number</th>
          <th class="px-4 py-2">User Name</th>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
          <th class="px-4 py-2">Assigned To</th>
          <?php endif; ?>
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
                <?php echo e(sprintf('TCK-%04d', $ticket->ticket_number)); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($ticket->user_id ? $ticket->user->name : 'Deleted User'); ?>

              </td>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
              <td class="border px-4 py-2">
                <?php echo e($ticket->assigned_to_id ? $ticket->assignedTo->name : 'Unassigned'); ?>

              </td>
              <?php endif; ?>
              <td class="border px-4 py-2">
                <?php echo e($ticket->title); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($ticket->status); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($ticket->priority); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($ticket->category->name ?? 'Uncategorized'); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($ticket->created_at); ?>

              </td>
            </tr>
           
        </tbody>
    </table>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/tickets/details.blade.php ENDPATH**/ ?>