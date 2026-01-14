<div>
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
                    <td class="border px-4 py-2"><select wire:change="changeStatus(<?php echo e($ticket->id); ?>, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded">
                                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['in_process', 'resolved', 'closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($status); ?>"><?php echo e($ticket->status === $status ? '' : ''); ?>

                                                      <?php echo e(ucfirst($status)); ?>

                                                    </option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </select></td>
                    <td class="border px-4 py-2"><select wire:change="changePriority(<?php echo e($ticket->id); ?>, $event.target.value)" class="mt-1 block w-full border-gray-300 rounded">
                                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['low', 'medium', 'high', 'critical']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($priority); ?>"><?php echo e($ticket->priority === $priority ? '' : ''); ?>

                                                      <?php echo e(ucfirst($priority)); ?> <!--Change uppercase first letter-->
                                                    </option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </select></td>
                    <td class="border px-4 py-2"><?php echo e($ticket->created_at); ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ticket)): ?>
                      <button wire:click="deleteTicket(<?php echo e($ticket->id); ?>)"
                        class="px-2 py-1 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    <?php endif; ?>
                    <a href="<?php echo e(route('details', $ticket->ticket_number)); ?>"
                      class="px-2 py-1 bg-blue-600 text-white rounded ml-4">
                        Details
                    </a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<script>
  window.addEventListener('ticketUpdated', event => {
      Livewire.emit('refreshTicket', event.detail);
  });
</script>
<?php /**PATH /var/www/html/resources/views/livewire/tickets/show.blade.php ENDPATH**/ ?>