
<div class="flex flex-wrap items-center align-center gap-3 mb-5 ml-4">
  <div class="relative inline-block ml-4 mb-6 mt-4">
    <button type="button" wire:click="toggleStatusDropdownGlobal"
      class="px-3 py-1 rounded-lg font-medium border items-center gap-1 transition-colors duration-200"
      style="background-color: <?php echo e($statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'); ?>20;
      border: 1px solid <?php echo e($statusFilter ? $statuses->firstWhere('id', $statusFilter)->color : '#458cf7'); ?>99;">
      
        <?php echo e($statusFilter ? ucfirst(str_replace('_', ' ', $statuses->firstWhere('id', $statusFilter)->name)) : 'Status'); ?>

    </button>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openStatusDropdownGlobal): ?>
      <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button 
              wire:click="filterBy(<?php echo e($status->id); ?>, <?php echo e($statusPriority ?? 'null'); ?>)"
              class="block w-full text-left px-4 py-2 text-sm transition duration-150 hover:brightness-110"
              style="background-color: <?php echo e($status->color); ?>50; color: black;"
          >
              <?php echo e($status->name); ?>

          </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


  </div>
  
  <div class="relative inline-block mb-6 mt-4">
    <button type="button" wire:click="togglePriorityDropdownGlobal"
      class="px-3 py-1 rounded-lg font-medium border items-center gap-1 transition-colors duration-200"
      style="background-color: <?php echo e($statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'); ?>20;
      border: 1px solid <?php echo e($statusPriority ? $priorities->firstWhere('id', $statusPriority)->colorPriority : '#458cf7'); ?>99;">
      
        <?php echo e($statusPriority ? ucfirst(str_replace('_', ' ', $priorities->firstWhere('id', $statusPriority)->name)) : 'Priority'); ?>

    </button>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($openPriorityDropdownGlobal): ?>
      <div class="absolute z-20 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-200">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button wire:click="filterBy(<?php echo e($statusFilter ?? 'null'); ?>, <?php echo e($priority->id); ?>)"
              class="block w-full text-left px-4 py-2 text-sm transition duration-150 hover:brightness-110"
              style="background-color: <?php echo e($priority->colorPriority); ?>50; color: black;">
              <?php echo e($priority->name); ?>

          </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

  </div>
    <select wire:model.lazy="order" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-1 rounded-lg h-[32px] ">
      <option value="asc">ASC</option>
      <option value="desc">DESC</option>
    </select>
    
    <select wire:model.lazy="userId" class="bg-gray-100 border border-gray-300 text-sm font-medium px-4.5 py-1 rounded-lg h-[32px] ">
      <option value = "">All</option>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </select>

    

    <button wire:click="clearFilters"
            class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
            CLEAR
    </button>

    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'search','type' => 'text','class' => 'block w-[150px]','wire:model.live.debounce.300ms' => 'search','placeholder' => 'Search...','autocomplete' => 'search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search','type' => 'text','class' => 'block w-[150px]','wire:model.live.debounce.300ms' => 'search','placeholder' => 'Search...','autocomplete' => 'search']); ?>
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
<?php /**PATH /var/www/html/resources/views/livewire/tickets/filters.blade.php ENDPATH**/ ?>