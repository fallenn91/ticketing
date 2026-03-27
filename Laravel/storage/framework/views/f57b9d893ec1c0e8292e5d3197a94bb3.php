<div class="bg-white shadow-md rounded-lg p-4 mt-6">
    <h2 class="text-lg font-semibold text-[var(--negro)] mb-3">Últimas Actividades</h2>
    <ul class="divide-y divide-gray-200">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="py-2 flex items-start space-x-3">
                <i class="<?php echo e($activity['icon']); ?> text-[var(--verde)] mt-1"></i>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold"><?php echo e($activity['user']); ?></span> <?php echo e($activity['action']); ?>

                    </p>
                    <p class="text-xs text-gray-400"><?php echo e($activity['time']); ?></p>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</div><?php /**PATH /var/www/html/resources/views/livewire/diabolo/assets/recent-activities.blade.php ENDPATH**/ ?>