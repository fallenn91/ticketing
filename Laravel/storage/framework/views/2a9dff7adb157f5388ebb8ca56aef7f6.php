<?php $__env->startSection('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Categories</h6>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="d-flex text-body-secondary pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <a href="<?php echo e(route('category.product', $category->id)); ?>"><strong class="text-gray-dark">Categoria <?php echo e($category->name); ?></strong></a>
                
                <form method="POST" action="<?php echo e(route('category.destroy', $category->id)); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-outline-danger">DELETE</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/categories/list.blade.php ENDPATH**/ ?>