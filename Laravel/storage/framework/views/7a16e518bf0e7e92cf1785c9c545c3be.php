<div>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showFilters): ?>
  <div class="flex items-center content-center gap-2 mb-6 ml-4 mt-5">
    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'filterByStatus','value' => ''.e(__('STATUS')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'filterByStatus','value' => ''.e(__('STATUS')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
    
    <button wire:click="filterByStatus(null)" class="bg-gray-800 border border-gray-300 text-white text-sm font-medium px-1.5 py-0.5 rounded-lg">ALL</button>
    <button wire:click="filterByStatus('open')" class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">OPEN</button>
    <button wire:click="filterByStatus('in_process')" class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">IN PROCESS</button>
    <button wire:click="filterByStatus('resolved')" class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">RESOLVED</button>
    <button wire:click="filterByStatus('closed')" class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">CLOSED</button>

    
    <select wire:model.lazy="creationFilter" class="bg-gray-100 border border-gray-300 text-sm font-medium px-2.5 py-0.5 rounded-lg h-[28px] ">
      <option value="desc">DESC</option>
      <option value="asc">ASC</option>
    </select>
    
    
    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'search','type' => 'text','class' => 'mt-1 block w-[150px]','wire:model.defer' => 'search','wire:keydown.enter' => 'filterBySearching','placeholder' => 'Search your ticket...','autocomplete' => 'search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search','type' => 'text','class' => 'mt-1 block w-[150px]','wire:model.defer' => 'search','wire:keydown.enter' => 'filterBySearching','placeholder' => 'Search your ticket...','autocomplete' => 'search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
  </div>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showPriority): ?>
  <div class="flex items-center content-center gap-2 mb-6 ml-4 mt-5">
    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'filterByPriority','value' => ''.e(__('PRIORITY')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'filterByPriority','value' => ''.e(__('PRIORITY')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
    <button wire:click="filterByPriority(null)" class="bg-gray-800 border border-gray-300 text-white text-sm font-medium px-1.5 py-0.5 rounded-lg">ALL</button>
    <button wire:click="filterByPriority('low')" class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">LOW</button>
    <button wire:click="filterByPriority('medium')" class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">MEDIUM</button>
    <button wire:click="filterByPriority('high')" class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">HIGH</button>
    <button wire:click="filterByPriority('critical')" class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">CRITIAL</button>

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