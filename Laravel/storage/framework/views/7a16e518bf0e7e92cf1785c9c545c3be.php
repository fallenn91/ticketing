<div>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showFilters): ?>
  <div class="flex gap-2 mb-6">
              
    <button wire:click="filterByStatus(null)" class="bg-gray-800 border border-gray-300 text-white text-sm font-medium px-1.5 py-0.5 rounded-lg">ALL</button>
    <button wire:click="filterByStatus('open')" class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">OPEN</button>
    <button wire:click="filterByStatus('in_process')" class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">IN PROCESS</button>
    <button wire:click="filterByStatus('resolved')" class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">RESOLVED</button>
    <button wire:click="filterByStatus('closed')" class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">CLOSED</button>
              
  </div>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <td class="border px-4 py-2"><button wire:click="toggleStatusDropdown(<?php echo e($ticket->id); ?>)"
                      class="px-3 py-1 rounded-full text-sm font-semibold 
                      <?php echo e(match($ticket->status) {
                            'open' => 'bg-gray-100 text-gray-800',
                            'in_process' => 'bg-blue-100 text-blue-800',
                            'resolved' => 'bg-green-100 text-green-800',
                            'closed' => 'bg-red-100 text-red-800',
                      }); ?>">
                      <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status))); ?>

                      </button>
                    <!--Dropdown-->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdown === $ticket->id): ?>
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['open', 'in_process', 'resolved', 'closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <button wire:click="changeStatus(<?php echo e($ticket->id); ?>, '<?php echo e($status); ?>')"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100
                        <?php echo e(match($ticket->status) {
                            'open' => 'bg-gray-100 text-gray-800',
                            'in_process' => 'bg-blue-100 text-blue-800',
                            'resolved' => 'bg-green-100 text-green-800',
                            'closed' => 'bg-red-100 text-red-800',
                      }); ?>">
                        
                        <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                      </button>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                  </td>
                  <td class="border px-4 py-2"><button wire:click="togglePriorityDropdown(<?php echo e($ticket->id); ?>)" 
                    class="px-3 py-1 rounded-full text-sm font-semibold
                    <?php echo e(match($ticket->priority) {
                          'low' => 'bg-green-100 text-green-800',
                          'medium' => 'bg-yellow-100 text-yellow-800',
                          'high' => 'bg-orange-100 text-orange-800',
                          'critical' => 'bg-red-100 text-red-800',
                    }); ?>">
                      <?php echo e(ucfirst(str_replace('_', ' ', $ticket->priority))); ?>

                    </button>
                    <!--Dropdown-->
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openPriorityDropdown === $ticket->id): ?>
                      <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['low', 'medium', 'high', 'critical']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <button wire:click="changePriority(<?php echo e($ticket->id); ?>, '<?php echo e($priority); ?>')"
                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100
                            <?php echo e(match($ticket->priority) {
                          'low' => 'bg-green-100 text-green-800',
                          'medium' => 'bg-yellow-100 text-yellow-800',
                          'high' => 'bg-orange-100 text-orange-800',
                          'critical' => 'bg-red-100 text-red-800',
                    }); ?>">
                            <?php echo e(ucfirst(str_replace('_', ' ', $priority))); ?>

                          </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                      </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td class="border px-4 py-2"><?php echo e($ticket->created_at); ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ticket)): ?>
                      <button wire:click="deleteTicket(<?php echo e($ticket->id); ?>)"
                        class="px-4 py-2 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    <?php endif; ?>
                    <a href="<?php echo e(route('details', $ticket->ticket_number)); ?>"
                      class="px-4 py-2 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
        </tbody>
    </table>
    
</div>
<?php /**PATH /var/www/html/resources/views/livewire/tickets/show.blade.php ENDPATH**/ ?>