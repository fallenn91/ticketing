<div>
    <div class="p-4 border rounded-lg bg-gray-50">
    <h3 class="font-semibold text-lg mb-2">Tickets: <?php echo e($user->name); ?></h3>

    <div class="flex flex-wrap gap-2 mb-3">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $statusCount = $user->assignedTo->where('status_id', $status->id)->count();
            ?>
            <span class="px-3 py-1 rounded-lg font-medium border"
                  style="background-color: <?php echo e($status->color); ?>50; color:black; border: 1px solid <?php echo e($status->color); ?>99;">
                <?php echo e($status->name); ?> (<?php echo e($statusCount); ?>)
            </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $priorityCount = $user->assignedTo->where('priority_id', $priority->id)->count();
            ?>
            <span class="px-3 py-1 rounded-lg font-medium border"
                  style="background-color: <?php echo e($priority->colorPriority); ?>50; color:black; border: 1px solid <?php echo e($priority->colorPriority); ?>99;">
                <?php echo e($priority->name); ?> (<?php echo e($priorityCount); ?>)
            </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

</div>
<?php /**PATH /var/www/html/resources/views/livewire/tickets/ticket-summary.blade.php ENDPATH**/ ?>