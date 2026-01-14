
  <div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket): ?>
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
    
        <div class="col-span-6 sm:col-span-4">
          
          <!-- Ticket Comment -->
            <h2 class="text-lg font-semibold">Comments</h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="mt-2 p-2 border border-gray-300 rounded">
                    <p class="text-sm text-gray-600">
                        <strong><?php echo e($comment->userComment->name ?? 'Deleted User'); ?></strong> commented:
                    </p>
                    <p class="mt-1"><?php echo nl2br(e($comment->comment)); ?></p>
                    <p class="text-xs text-gray-400 mt-1"><?php echo e($comment->created_at->format('d/m/Y H:i')); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="mt-1 block w-full border border-gray-300 rounded p-2">No comments available.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

              
                <!-- Ticket Description -->
                <h2 class="text-lg font-semibold">Description</h2>
                
            <p class="mt-1 block w-full border-gray-300 rounded">
                <?php echo e($ticket->description); ?>  
            </p>
            
        </div>
    
  </div>
    <?php else: ?>
      <p class="text-center text-gray-500">No ticket selected.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/tickets/details.blade.php ENDPATH**/ ?>