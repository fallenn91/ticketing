<div>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket): ?>
  <table class="table-auto w-full">
    <thead>
      <tr>
        <th class="px-4 py-2">Ticket Number</th>
        <th class="px-4 py-2">Created By</th>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
        <th class="px-4 py-2">Assigned To</th>
        <?php endif; ?>
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
          <?php echo e(sprintf('TCK-%04d', $ticket->ticket_number)); ?>

        </td>
        <td class="border px-4 py-2">
          <?php echo e($ticket->creator ? $ticket->creator->name : 'Deleted User'); ?>

        </td>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
        <td class="border px-4 py-2">
          <select wire:change="assignedToIdUpdate(<?php echo e($ticket->id); ?>, $event.target.value)" class="mt-1 block w-full">
            <option value="">-- Assign User --</option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value = "<?php echo e($user->id); ?>"
                <?php if($ticket->assigned_to_id == $user->id): ?> 
                selected 
                <?php endif; ?>>
                <?php echo e($user->name); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </select>
        </td>
        <?php endif; ?>
        <td class="border px-4 py-2">
          <?php echo e($ticket->title); ?>

        </td>
        <td class="border px-4 py-2">
            <span class="block px-3 py-1 rounded-full text-sm font-semibold"
            style="background-color: <?php echo e($ticket->status->color . '20'); ?>; 
            border: 1px solid <?php echo e($ticket->status->color); ?>99;">
            <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status->name))); ?>

            </span>
        </td>
        <td class="border px-4 py-2">
            <span class="px-3 py-1 rounded-full text-sm font-semibold"
            style="background-color: <?php echo e($ticket->priority->colorPriority . '20'); ?>;
            border: 1px solid <?php echo e($ticket->priority->colorPriority); ?>99;">
              <?php echo e(ucfirst(str_replace('_', ' ', $ticket->priority->name))); ?>

            </span>
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
  <div class="col-span-6 sm:col-span-4 px-3 py-3 space-y-6">
      <!-- Ticket Description -->
        <div class="border p-4">
          <h2 class="text-lg font-semibold">Group Assigned</h2>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->group): ?>
              <p class="mt-1 block w-full border-gray-300 rounded">
                  <?php echo e($ticket->group->name); ?>  
              </p>
          <?php else: ?>
              <p class="mt-1 block w-full border-gray-300 rounded">
                  No Ticket Group Assigned.  
              </p>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
              <h2 class="text-lg font-semibold">Description</h2>
              
              <p class="mt-1 block w-full border-gray-300 rounded">
                  <?php echo e($ticket->description); ?>  
              </p>
    
        </div>
      <div class="grid grid-cols-2 gap-6">

            <!-- Ticket History Comment -->
        <div class="border p-4 max-h-[500px] overflow-y-auto">

          <h2 class="text-lg font-semibold">History Comments</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->comments->count()): ?>
              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-4 p-2 border-b">

                  <?php echo e($comment->user->name ?? 'Deleted User'); ?> : <?php echo e($comment->comment); ?>

                  <p class="text-sm font-bold px-5 py-1.5">Ticket ID: <?php echo e($comment->ticket_id); ?> </p>
                  <p class="text-sm font-bold px-5 py-1.5">Ticket Number: <?php echo e($comment->ticket->ticket_number); ?></p>
                  <p class="text-sm font-bold px-5 py-1.5">Created At: <?php echo e($comment->created_at); ?></p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
              <!-- Ticket Comment -->
        <div class="flex flex-col botder p-4 max-h-[500px]">

          <h2 class="text-lg font-semibold">Comments</h2>
            <div class="px-2.5 py-3 w-full border max-h-64 overflow-y-auto">
              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->comments->count()): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="mb-2">

                    <?php echo e($comment->user->name ?? 'Deleted User'); ?>: 
                    <span><?php echo e($comment->comment); ?></span>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
              <?php else: ?>
                  <p class="text-gray-500">No comments yet.</p>
              <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
    
            <form wire:submit.prevent="addComment(<?php echo e($ticket->id); ?>)" class="mt-4 flex">
              <input type="text" wire:model.defer="newComment" class="flex-1 px-5 py-2.5 border rounded">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded ml-4">Send</button>
            </form>
        </div>
      </div>
          
        
            
    </div>
    
  </div>
    <?php else: ?>
      <p class="text-center text-gray-500">No ticket selected.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/tickets/details.blade.php ENDPATH**/ ?>