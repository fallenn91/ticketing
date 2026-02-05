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
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="border px-4 py-2"><?php echo e(sprintf('TCK-%04d', $ticket->ticket_number)); ?></td>
                <td class="border px-4 py-2"><?php echo e($ticket->title); ?></td>
                <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown(<?php echo e($ticket->id); ?>)" class="px-3 py-1 rounded-full text-sm font-semibold"
                style="background-color: <?php echo e($ticket->status->color); ?>20; color:black; border: 1px solid <?php echo e($ticket->status->color); ?>99;"> 
                <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status->name))); ?></button>
              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdown === $ticket->id): ?>
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <button wire:click="changeStatus(<?php echo e($ticket->id); ?>, <?php echo e($status->id); ?>)"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                        style="background-color: <?php echo e($status->color); ?>50; color: black;" >
                        
                        <?php echo e(ucfirst(str_replace('_', ' ', $status->name))); ?>

                      </button>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                      
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td class="border px-4 py-2">
                  <button wire:click="togglePriorityDropdown(<?php echo e($ticket->id); ?>) " class="px-3 py-1 rounded-full text-sm font-semibold"
                    style="background-color: <?php echo e($ticket->priority->colorPriority); ?>20; color:black; border: 1px solid <?php echo e($ticket->priority->colorPriority); ?>99;"> 
                    <?php echo e(ucfirst(str_replace('_', ' ', $ticket->priority->name))); ?>

                  </button>
              
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openPriorityDropdown === $ticket->id): ?>
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button wire:click="changePriority(<?php echo e($ticket->id); ?>, '<?php echo e($priority->id); ?>')"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                          style="background-color: <?php echo e($priority->colorPriority); ?>50; color: black;" >
                          <?php echo e(ucfirst(str_replace('_', ' ', $priority->name))); ?>

                        </button>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                
                <td class="border px-4 py-2"><?php echo e($ticket->created_at); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
      </table>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/my-tickets.blade.php ENDPATH**/ ?>