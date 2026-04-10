<div>
  <?php echo $__env->make('livewire.tickets.filters', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
                <td class="border px-4 py-2"><?php echo e(sprintf('TCK-%04d', $ticket->ticket_number)); ?> 
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->group): ?>
                  <span class="inline-block border border-black px-2 py-1 rounded-lg text-sm ml-4">
                    <?php echo e($ticket->group->name); ?>

                  </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td class="border px-4 py-2"><?php echo e($ticket->title); ?></td>
                <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown(<?php echo e($ticket->id); ?>)" class="px-3 py-1 rounded-full text-sm font-semibold"
                style="background-color: <?php echo e($ticket->status->color); ?>20; color:black; border: 1px solid <?php echo e($ticket->status->color); ?>99;"> 
                <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status->name))); ?></button>
              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdowns[$ticket->id] ?? false): ?>
                    <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
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
              
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openPriorityDropdowns[$ticket->id] ?? false): ?>
                    <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
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
                
                <td class="border px-4 py-2"><?php echo e($ticket->created_at); ?>

                  <a href="<?php echo e(route('details', $ticket->ticket_number)); ?>"
                      class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 transition-colors duration-200 text-white rounded-lg ml-4">
                        Details
                  </a>
                </td>
            </tr>
            
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
      </table>
      <div class="flex justify-center items-center mb-6 ml-4 mt-5">
        <?php echo e($tickets->links()); ?>

      </div>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/my-tickets.blade.php ENDPATH**/ ?>