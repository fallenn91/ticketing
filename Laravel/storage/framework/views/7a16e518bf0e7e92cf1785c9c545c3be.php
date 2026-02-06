<div>
  <div class="relative inline-block ml-4 mb-6 mt-4">
    <button type="button" wire:click="$toggle('openStatusDropdown1')"
      class="px-3 py-1 rounded-lg font-medium border"
      style="background-color: <?php echo e($statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'); ?>20;
      border: 1px solid <?php echo e($statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'); ?>99;">
      
        <?php echo e($statusFilter ? ucfirst(str_replace('_', ' ', $statuses->firstWhere('id', $statusFilter)->name)) : 'Status'); ?>

    </button>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdown1): ?>
      <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button wire:click="filterBy(<?php echo e($status->id); ?>, <?php echo e($statusPriority ?? 'null'); ?>)"
              class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
              style="background-color: <?php echo e($status->color); ?>50; color: black;">
              <?php echo e($status->name); ?>

          </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

  

    <button type="button" wire:click="$toggle('openPriorityDropdown1')"
      class="px-3 py-1 rounded-lg font-medium border"
      style="background-color: <?php echo e($statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'); ?>20;
      border: 1px solid <?php echo e($statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'); ?>99;">
      
        <?php echo e($statusPriority ? ucfirst(str_replace('_', ' ', $priorities->firstWhere('id', $statusPriority)->name)) : 'Priority'); ?>

    </button>

  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openPriorityDropdown1): ?>
    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button wire:click="filterBy(<?php echo e($statusFilter ?? 'null'); ?>, <?php echo e($priority->id); ?>)"
            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
            style="background-color: <?php echo e($priority->colorPriority); ?>50; color: black;">
            <?php echo e($priority->name); ?>

        </button>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <select wire:model.lazy="order" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-0.5 rounded-lg h-[28px] ">
      <option value="asc">ASC</option>
      <option value="desc">DESC</option>
    </select>
    
    <select wire:model.lazy="creationUser" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-0.5 rounded-lg h-[28px] ">
      <option value = "">All</option>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </select>

    

    <button wire:click="clearFilters"
            class="px-1.5 py-0.5 bg-red-600 text-white rounded-lg mt-4">
            CLEAR
    </button>
  
    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'search','type' => 'text','class' => 'mt-4 block w-[150px]','wire:model.live.debounce.300ms' => 'search','placeholder' => 'Search...','autocomplete' => 'search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search','type' => 'text','class' => 'mt-4 block w-[150px]','wire:model.live.debounce.300ms' => 'search','placeholder' => 'Search...','autocomplete' => 'search']); ?>
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
                      class="px-3 py-1 rounded-full text-sm font-semibold"
                      style="background-color: <?php echo e($ticket->status->color); ?>20; color: black; border: 1px solid <?php echo e($ticket->status->color); ?>99; ">
                      <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status->name))); ?>

                      </button>

                    <!--Dropdown-->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdown === $ticket->id): ?>
                    <div class="absolute z-10 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <button wire:click="changeStatus(<?php echo e($ticket->id); ?>, '<?php echo e($status->id); ?>')"
                        class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                        style="background-color: <?php echo e($status->color); ?>50; color: black;" >
                        
                        <?php echo e(ucfirst(str_replace('_', ' ', $status->name))); ?>

                      </button>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                      
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                  </td>
                  <td class="border px-4 py-2"><button wire:click="togglePriorityDropdown(<?php echo e($ticket->id); ?>)" 
                    class="px-3 py-1 rounded-full text-sm font-semibold"
                    style="background-color: <?php echo e($ticket->priority->colorPriority); ?>20; color: black;
                    border: 1px solid <?php echo e($ticket->priority->colorPriority); ?>99; ">
                      <?php echo e(ucfirst(str_replace('_', ' ', $ticket->priority->name))); ?>

                    </button>

                    <!--Dropdown-->
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
                    <td class="border px-4 py-2"><?php echo e($ticket->created_at); ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ticket)): ?>
                      <button wire:click="deleteTicket(<?php echo e($ticket->id); ?>)"
                        class="inline-block px-4 py-2 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    <?php endif; ?>
                    <a href="<?php echo e(route('details', $ticket->ticket_number)); ?>"
                      class="inline-block px-4 py-2 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
        </tbody>
      </table>
      <div class="flex justify-center items-center mb-6 ml-4 mt-5">
        <?php echo e($tickets->links('vendor.pagination.tailwind')); ?>

      </div>

    
    
</div><?php /**PATH /var/www/html/resources/views/livewire/tickets/show.blade.php ENDPATH**/ ?>