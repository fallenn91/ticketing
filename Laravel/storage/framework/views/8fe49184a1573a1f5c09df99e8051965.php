<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Tickets Management')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex gap-2 mb-6">
              
              <button wire:click="statusSelected(null)" class="bg-gray-800 border border-gray-300 text-white text-sm font-medium px-1.5 py-0.5 rounded-lg">ALL</button>
              <button wire:click="statusSelected('open')" class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">OPEN</button>
              <button wire:click="statusSelected('in_process')" class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">IN PROCESS</button>
              <button wire:click="statusSelected('resolved')" class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">RESOLVED</button>
              <button wire:click="statusSelected('closed')" class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">CLOSED</button>
              
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('tickets.show', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-947317877-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/ticketManagement.blade.php ENDPATH**/ ?>