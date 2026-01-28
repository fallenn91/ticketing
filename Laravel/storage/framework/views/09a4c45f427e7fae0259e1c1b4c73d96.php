<?php $__env->startSection('content'); ?>
<div class="col-lg-6 col-md-8 mx-auto">
    <h1 class="fw-light">
        <?php echo e($category ? 'Productes de ' . $category->name : 'Tots els productes'); ?>

    </h1>
</div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="alert alert-danger text-center">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($products->isEmpty()): ?>
  <p class="text-center">No hi ha productes per mostrar.</p>
<?php else: ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col">
        <div class="card shadow-sm">
            <img src="<?php echo e(asset('storage/' . $product->img )); ?>" style="width: 500px" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
            <div class="card-body">
                <p class="card-text">Product Name: <?php echo e($product->name); ?></p>
                <p class="card-text">Price: <?php echo e($product->price); ?></p>
                <p class="card-text">Category: <?php echo e($product->category); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <form method="POST" action="<?php echo e(route('products.destroy', $product->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/products/list.blade.php ENDPATH**/ ?>