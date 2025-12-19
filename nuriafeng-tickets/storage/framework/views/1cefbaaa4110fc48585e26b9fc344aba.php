<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['ticket', 'fromAdmin' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['ticket', 'fromAdmin' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href="<?php echo e(route('tickets.show', $ticket)); ?><?php echo e($fromAdmin ? '?from=admin' : ''); ?>"
   class="block bg-surface border border-border rounded-lg shadow-soft dark:shadow-dark-soft p-3 hover:shadow-medium hover:border-accent/30 transition-all duration-200 group">

    
    <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-2 min-w-0 flex-1">
            <span class="text-xs font-mono text-content-muted shrink-0">#<?php echo e($ticket->id); ?></span>
            <h3 class="font-semibold text-sm text-content truncate group-hover:text-accent transition-colors">
                <?php echo e($ticket->title); ?>

            </h3>
        </div>
        <div class="flex items-center gap-1.5 shrink-0">
            <?php if (isset($component)) { $__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-type-badge','data' => ['type' => $ticket->type,'size' => 'icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-type-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->type),'size' => 'icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02)): ?>
<?php $attributes = $__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02; ?>
<?php unset($__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02)): ?>
<?php $component = $__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02; ?>
<?php unset($__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8c81617a70e11bcf247c4db924ab1b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-badge','data' => ['status' => $ticket->status,'size' => 'icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->status),'size' => 'icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $attributes = $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $component = $__componentOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalb3f3930a96171a12366c9551b2dd3c07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3f3930a96171a12366c9551b2dd3c07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-badge','data' => ['priority' => $ticket->priority,'size' => 'icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['priority' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->priority),'size' => 'icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3f3930a96171a12366c9551b2dd3c07)): ?>
<?php $attributes = $__attributesOriginalb3f3930a96171a12366c9551b2dd3c07; ?>
<?php unset($__attributesOriginalb3f3930a96171a12366c9551b2dd3c07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3f3930a96171a12366c9551b2dd3c07)): ?>
<?php $component = $__componentOriginalb3f3930a96171a12366c9551b2dd3c07; ?>
<?php unset($__componentOriginalb3f3930a96171a12366c9551b2dd3c07); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal063ef6340f5e96725a9814a04adffcf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal063ef6340f5e96725a9814a04adffcf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.relative-time','data' => ['date' => $ticket->created_at,'short' => true,'class' => 'text-xs text-content-muted ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('relative-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->created_at),'short' => true,'class' => 'text-xs text-content-muted ml-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $attributes = $__attributesOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $component = $__componentOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__componentOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
        </div>
    </div>

    
    <p class="mt-1.5 text-xs text-content-secondary line-clamp-1">
        <?php echo e($ticket->description); ?>

    </p>

    
    <div class="flex items-center justify-between gap-3 mt-2 text-xs text-content-muted">
        <div class="flex items-center gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->category): ?>
            <span class="inline-flex items-center gap-1">
                <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <?php echo e($ticket->category->name); ?>

            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->assignee): ?>
            <span class="inline-flex items-center gap-1">
                <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <?php echo e($ticket->assignee->name); ?>

            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->deadline): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'inline-flex items-center gap-1',
                'text-red-500 font-medium' => $ticket->isOverdue(),
                'text-amber-500' => !$ticket->isOverdue() && $ticket->isNearDeadline(),
            ]); ?>">
                <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <?php echo e($ticket->deadline->format('d/m')); ?>

            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->updated_at->gt($ticket->created_at->addMinutes(1))): ?>
        <span class="inline-flex items-center gap-1" title="Modificado">
            <svg class="w-2.5 h-2.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <?php if (isset($component)) { $__componentOriginal063ef6340f5e96725a9814a04adffcf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal063ef6340f5e96725a9814a04adffcf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.relative-time','data' => ['date' => $ticket->updated_at,'short' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('relative-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->updated_at),'short' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $attributes = $__attributesOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $component = $__componentOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__componentOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
        </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</a>
<?php /**PATH /var/www/html/resources/views/components/ticket-card.blade.php ENDPATH**/ ?>