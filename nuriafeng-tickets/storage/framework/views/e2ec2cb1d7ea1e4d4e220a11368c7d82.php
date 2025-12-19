<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'ticket',
    'users' => collect(),
    'categories' => collect(),
    'isAdmin' => false,
    'assignedToId' => null,
    'categoryId' => null,
    'wireModelAssigned' => 'assigned_to_id',
    'wireModelCategory' => 'category_id',
    'deadline' => null,
    'wireModelDeadline' => 'deadline',
    'canEdit' => false,
]));

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

foreach (array_filter(([
    'ticket',
    'users' => collect(),
    'categories' => collect(),
    'isAdmin' => false,
    'assignedToId' => null,
    'categoryId' => null,
    'wireModelAssigned' => 'assigned_to_id',
    'wireModelCategory' => 'category_id',
    'deadline' => null,
    'wireModelDeadline' => 'deadline',
    'canEdit' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div <?php echo e($attributes->merge(['class' => 'grid grid-cols-2 gap-1 sm:flex sm:flex-wrap sm:items-start sm:gap-3 text-xs sm:text-sm'])); ?>>
    
    <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Categoría">
        <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Categoría</span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isAdmin): ?>
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary hover:text-content transition-colors"
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    <span class="truncate"><?php echo e($ticket->category?->name ?? 'Sin categoría'); ?></span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full left-0 mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden max-h-60 overflow-y-auto"
                >
                    
                    <?php $isNullSelected = is_null($categoryId); ?>
                    <button
                        type="button"
                        wire:click="$set('<?php echo e($wireModelCategory); ?>', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               <?php echo e($isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
                    >
                        <span class="text-content-muted">Sin categoría</span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNullSelected): ?>
                            <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $attributes = $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $component = $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </button>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = $categoryId == $category->id; ?>
                        <button
                            type="button"
                            wire:click="$set('<?php echo e($wireModelCategory); ?>', <?php echo e($category->id); ?>)"
                            @click="open = false"
                            class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                                   <?php echo e($isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
                        >
                            <?php echo e($category->name); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSelected): ?>
                                <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $attributes = $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $component = $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                <span class="truncate"><?php echo e($ticket->category?->name ?? 'Sin categoría'); ?></span>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Responsable">
        <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Responsable</span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isAdmin): ?>
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary hover:text-content transition-colors"
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="truncate"><?php echo e($ticket->assignee?->name ?? 'Sin asignar'); ?></span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full right-0 sm:left-0 sm:right-auto mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden max-h-60 overflow-y-auto"
                >
                    
                    <?php $isNullSelected = is_null($assignedToId); ?>
                    <button
                        type="button"
                        wire:click="$set('<?php echo e($wireModelAssigned); ?>', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               <?php echo e($isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
                    >
                        <span class="text-content-muted">Sin asignar</span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNullSelected): ?>
                            <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $attributes = $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $component = $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </button>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = $assignedToId == $user->id; ?>
                        <button
                            type="button"
                            wire:click="$set('<?php echo e($wireModelAssigned); ?>', <?php echo e($user->id); ?>)"
                            @click="open = false"
                            class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                                   <?php echo e($isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
                        >
                            <?php echo e($user->name); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSelected): ?>
                                <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $attributes = $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $component = $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span class="truncate"><?php echo e($ticket->assignee?->name ?? 'Sin asignar'); ?></span>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal01313ded8ff1d0a35e515b56937f74a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal01313ded8ff1d0a35e515b56937f74a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-metadata.field','data' => ['label' => 'Creado']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-metadata.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Creado']); ?>
         <?php $__env->slot('icon', null, []); ?> 
            <svg class="w-4 h-4 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
         <?php $__env->endSlot(); ?>
        <?php echo e($ticket->created_at->setTimezone(config('app.timezone'))->format('d/m/Y H:i')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal01313ded8ff1d0a35e515b56937f74a8)): ?>
<?php $attributes = $__attributesOriginal01313ded8ff1d0a35e515b56937f74a8; ?>
<?php unset($__attributesOriginal01313ded8ff1d0a35e515b56937f74a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01313ded8ff1d0a35e515b56937f74a8)): ?>
<?php $component = $__componentOriginal01313ded8ff1d0a35e515b56937f74a8; ?>
<?php unset($__componentOriginal01313ded8ff1d0a35e515b56937f74a8); ?>
<?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($canEdit): ?>
        <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50 hover:bg-surface-secondary transition-colors" title="Límite">
            <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Límite</span>
            <div x-data="{ open: false }" @click.outside="open = false" @keydown.escape.window="open = false" class="relative">
                <button
                    type="button"
                    @click="open = !open"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base hover:text-content transition-colors',
                        'text-red-500 font-medium' => $ticket->deadline && $ticket->isOverdue(),
                        'text-amber-500' => $ticket->deadline && !$ticket->isOverdue() && $ticket->isNearDeadline(),
                        'text-content-secondary' => !$ticket->deadline || (!$ticket->isOverdue() && !$ticket->isNearDeadline()),
                    ]); ?>"
                >
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0" :class="{ 'text-content-muted': !<?php echo e($ticket->deadline ? 'true' : 'false'); ?> }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->deadline): ?>
                            <?php echo e($ticket->isOverdue() ? 'Vencido:' : ''); ?>

                            <?php echo e($ticket->deadline->format('d/m/Y')); ?>

                        <?php else: ?>
                            Sin límite
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <svg class="w-2 h-2 sm:w-3 sm:h-3 shrink-0 text-content-muted transition-transform duration-150" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-cloak
                    class="absolute top-full right-0 sm:left-0 sm:right-auto mt-1.5 w-40 sm:w-48 bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden"
                >
                    
                    <?php $isNullSelected = is_null($deadline); ?>
                    <button
                        type="button"
                        wire:click="$set('<?php echo e($wireModelDeadline); ?>', null)"
                        @click="open = false"
                        class="w-full px-2 py-1.5 sm:px-3 sm:py-2 text-left text-xs sm:text-sm flex items-center justify-between transition-colors
                               <?php echo e($isNullSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
                    >
                        <span class="text-content-muted">Sin fecha límite</span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNullSelected): ?>
                            <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 sm:w-4 sm:h-4 text-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $attributes = $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2)): ?>
<?php $component = $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2; ?>
<?php unset($__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </button>

                    
                    <div class="px-2 py-1.5 sm:px-3 sm:py-2 border-t border-border">
                        <input
                            type="date"
                            wire:model.live="<?php echo e($wireModelDeadline); ?>"
                            @change="open = false"
                            class="w-full px-2 py-1 sm:py-1.5 text-xs sm:text-sm bg-surface-secondary border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-colors"
                        />
                    </div>
                </div>
            </div>
        </div>
    <?php elseif($ticket->deadline): ?>
        <div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50" title="Límite">
            <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">Límite</span>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base transition-colors duration-150',
                'text-red-500 font-medium' => $ticket->isOverdue(),
                'text-amber-500' => !$ticket->isOverdue() && $ticket->isNearDeadline(),
                'text-content-secondary' => !$ticket->isOverdue() && !$ticket->isNearDeadline(),
            ]); ?>">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="truncate">
                    <?php echo e($ticket->isOverdue() ? 'Vencido:' : ''); ?>

                    <?php echo e($ticket->deadline->format('d/m/Y')); ?>

                </span>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticket->updated_at->gt($ticket->created_at)): ?>
        <?php if (isset($component)) { $__componentOriginal01313ded8ff1d0a35e515b56937f74a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal01313ded8ff1d0a35e515b56937f74a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-metadata.field','data' => ['label' => 'Actualizado']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-metadata.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Actualizado']); ?>
             <?php $__env->slot('icon', null, []); ?> 
                <svg class="w-4 h-4 text-content-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
             <?php $__env->endSlot(); ?>
            <?php if (isset($component)) { $__componentOriginal063ef6340f5e96725a9814a04adffcf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal063ef6340f5e96725a9814a04adffcf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.relative-time','data' => ['date' => $ticket->updated_at,'resetEvent' => 'saved']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('relative-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->updated_at),'resetEvent' => 'saved']); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal01313ded8ff1d0a35e515b56937f74a8)): ?>
<?php $attributes = $__attributesOriginal01313ded8ff1d0a35e515b56937f74a8; ?>
<?php unset($__attributesOriginal01313ded8ff1d0a35e515b56937f74a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01313ded8ff1d0a35e515b56937f74a8)): ?>
<?php $component = $__componentOriginal01313ded8ff1d0a35e515b56937f74a8; ?>
<?php unset($__componentOriginal01313ded8ff1d0a35e515b56937f74a8); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/components/ticket-metadata-bar.blade.php ENDPATH**/ ?>