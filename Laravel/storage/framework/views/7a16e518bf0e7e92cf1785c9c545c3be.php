<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($ticket->id); ?></td>
                    <td class="border px-4 py-2"><?php echo e($ticket->title); ?></td>
                    <td class="border px-4 py-2"><?php echo e($ticket->status }</td>
                    <td class="border px-4 py-2"><select wire:model="priority" class="mt-1 block w-full border-gray-300 rounded">
                                                  <option value="low">Low</option>
                                                  <option value="medium">Medium</option>
                                                  <option value="high">High</option>
                                                  <option value="critical">Critical</option>
                                                </select></td>
                    <td class="border px-4 py-2">{{ $ticket->created_at); ?>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ticket)): ?>
                      <button wire:click="delete(<?php echo e($ticket->id); ?>)"
                        class="px-2 py-1 bg-red-600 text-white rounded ml-4"
                        >
                        Delete
                      </button>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/tickets/show.blade.php ENDPATH**/ ?>