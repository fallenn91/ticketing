<?php $__env->startSection('leftSidebar'); ?>

<div class="card sticky top-[115px]">
    <div class="card-body">
        <h2>Username</h2>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card mb-3">
    <div class="card-body">
        <h1 style="align-self: center;">Publicaciones</h1>
    </div>
</div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card mb-3">
    <div class="card-body">
        <div class="feed">
            <p style="font-weight: 600;">
                Publicado por: <?php echo e($post->user->name); ?>

            </p>

            <img src="<?php echo e($post->image); ?>" alt="post image">

            <p><?php echo e($post->description); ?></p>
            <p><?php echo e($post->created_at); ?></p>
        </div>
    </div>


</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('rightSidebar'); ?>
<div class="d-flex flex-column gap-3"> <!-- gap entre cards -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $jobsOffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-start">
            <div>
                <p style="font-weight: 600;"><?php echo e($job->user->name); ?> ha publicado esta oferta de trabajo</p>
                <p><strong><?php echo e($job->title); ?></strong></p>
                <p><?php echo e($job->description); ?></p>
                <p>Salario: <?php echo e($job->salary); ?> €</p>
                <p>Pulicado: <?php echo e($job->created_at); ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.profile', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/diabolo/profile.blade.php ENDPATH**/ ?>