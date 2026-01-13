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
  <div>
    <table class="table-auto w-80 justify-center mx-auto mt-10">
        <thead>
            <tr>
                <th class="px-4 py-2">Ticket Number</th>
                <th class="px-4 py-2">User Name</th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
                <th class="px-4 py-2">Assigned To</th>
                <?php endif; ?>
                <th class="px-4 py-2">Title</th>
                
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td class="border px-4 py-2">
                <?php echo e(sprintf('TCK-%04d', $Ticket->ticket_number)); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->user->name); ?>

              </td>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\Ticket::class)): ?>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->assigned_to_id ? $Ticket->assignedTo->name : 'Unassigned'); ?>

              </td>
              <?php endif; ?>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->title); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->status); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->priority); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->category->name); ?>

              </td>
              <td class="border px-4 py-2">
                <?php echo e($Ticket->created_at); ?>

              </td>
            </tr>
        </tbody>
    </table>
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/details.blade.php ENDPATH**/ ?>