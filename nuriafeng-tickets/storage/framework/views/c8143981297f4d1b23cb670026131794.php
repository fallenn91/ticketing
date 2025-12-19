
<?php if (isset($component)) { $__componentOriginal06836675577e76179bdfdb2ebf28e54d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06836675577e76179bdfdb2ebf28e54d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.bottom-sheet','data' => ['name' => 'ticket-edit','title' => 'Editar ticket','maxHeight' => '90vh']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.bottom-sheet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'ticket-edit','title' => 'Editar ticket','maxHeight' => '90vh']); ?>
    <div class="p-4 space-y-4">
        <div>
            <label for="edit-title" class="block text-xs font-semibold uppercase tracking-wider text-content-muted mb-1.5">
                Título
            </label>
            <input
                id="edit-title"
                type="text"
                wire:model="title"
                class="w-full px-3 py-2 text-sm bg-surface-secondary border border-border rounded-lg
                       text-content placeholder:text-content-muted
                       focus:ring-2 focus:ring-accent/30 focus:border-accent focus:outline-none
                       transition-all"
                placeholder="Título del ticket..."
            />
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div>
            <label for="edit-description" class="block text-xs font-semibold uppercase tracking-wider text-content-muted mb-1.5">
                Descripción
            </label>
            <textarea
                id="edit-description"
                wire:model="description"
                rows="6"
                class="w-full px-3 py-2 text-sm bg-surface-secondary border border-border rounded-lg
                       text-content placeholder:text-content-muted leading-relaxed
                       focus:ring-2 focus:ring-accent/30 focus:border-accent focus:outline-none
                       transition-all resize-none"
                placeholder="Describe el problema o solicitud..."
            ></textarea>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

     <?php $__env->slot('footer', null, []); ?> 
        <div class="flex gap-3 p-4">
            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['type' => 'button','variant' => 'secondary','class' => 'flex-1','@click' => '$dispatch(\'close-ticket-edit-sheet\'); $wire.cancelEditingAll()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','variant' => 'secondary','class' => 'flex-1','@click' => '$dispatch(\'close-ticket-edit-sheet\'); $wire.cancelEditingAll()']); ?>
                Cancelar
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['type' => 'button','class' => 'flex-1','@click' => '$wire.saveTicketFields().then(() => $dispatch(\'close-ticket-edit-sheet\'))']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'flex-1','@click' => '$wire.saveTicketFields().then(() => $dispatch(\'close-ticket-edit-sheet\'))']); ?>
                Guardar
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06836675577e76179bdfdb2ebf28e54d)): ?>
<?php $attributes = $__attributesOriginal06836675577e76179bdfdb2ebf28e54d; ?>
<?php unset($__attributesOriginal06836675577e76179bdfdb2ebf28e54d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06836675577e76179bdfdb2ebf28e54d)): ?>
<?php $component = $__componentOriginal06836675577e76179bdfdb2ebf28e54d; ?>
<?php unset($__componentOriginal06836675577e76179bdfdb2ebf28e54d); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/ticket-edit-sheet.blade.php ENDPATH**/ ?>