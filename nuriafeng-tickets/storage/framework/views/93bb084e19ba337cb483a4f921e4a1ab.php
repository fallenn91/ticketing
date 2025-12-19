<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'statuses' => [],
    'priorities' => [],
    'deadlineOptions' => [],
    'status' => [],
    'priority' => [],
    'deadline' => [],
    'activeFilterCount' => 0,
    'extraFilters' => [],
    'types' => [],
    'categories' => null,
    'users' => null,
    'type' => [],
    'category' => [],
    'creator' => [],
    'assignee' => [],
    'showTrigger' => true,
    // Sorting props:
    'sortField' => 'created_at',
    'sortDirection' => 'desc',
    'sortFields' => [],
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
    'statuses' => [],
    'priorities' => [],
    'deadlineOptions' => [],
    'status' => [],
    'priority' => [],
    'deadline' => [],
    'activeFilterCount' => 0,
    'extraFilters' => [],
    'types' => [],
    'categories' => null,
    'users' => null,
    'type' => [],
    'category' => [],
    'creator' => [],
    'assignee' => [],
    'showTrigger' => true,
    // Sorting props:
    'sortField' => 'created_at',
    'sortDirection' => 'desc',
    'sortFields' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $selectedStatuses = is_array($status) ? $status : ($status ? [$status] : []);
    $selectedPriorities = is_array($priority) ? $priority : ($priority ? [$priority] : []);
    $selectedDeadlines = is_array($deadline) ? $deadline : ($deadline ? [$deadline] : []);
    $selectedTypes = is_array($type) ? $type : ($type ? [$type] : []);
    $selectedCategories = is_array($category) ? $category : ($category ? [$category] : []);
    $selectedCreators = is_array($creator) ? $creator : ($creator ? [$creator] : []);
    $selectedAssignees = is_array($assignee) ? $assignee : ($assignee ? [$assignee] : []);
?>

<?php if (isset($component)) { $__componentOriginal06836675577e76179bdfdb2ebf28e54d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06836675577e76179bdfdb2ebf28e54d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.bottom-sheet','data' => ['name' => 'filter','title' => 'Filtros']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.bottom-sheet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'filter','title' => 'Filtros']); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showTrigger): ?>
         <?php $__env->slot('trigger', null, []); ?> 
            <button
                type="button"
                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl
                       bg-surface-secondary border border-border text-content
                       hover:bg-surface-tertiary active:scale-[0.97] transition-all duration-200"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span>Filtros</span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeFilterCount > 0): ?>
                    <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                        <?php echo e($activeFilterCount); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </button>
         <?php $__env->endSlot(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeFilterCount > 0): ?>
         <?php $__env->slot('headerActions', null, []); ?> 
            <button
                type="button"
                wire:click="clearFilters"
                class="p-2 rounded-full text-content-muted hover:text-accent hover:bg-accent/10 transition-colors"
                title="Limpiar filtros"
            >
                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
         <?php $__env->endSlot(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="px-4 py-3 space-y-4">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($sortFields) > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Ordenar por</h4>

                
                <div class="flex flex-wrap gap-2 mb-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sortFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = $sortField === $field; ?>
                        <button
                            type="button"
                            wire:click="sortBy('<?php echo e($field); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="flex items-center gap-2">
                    <span class="text-xs text-content-muted">Orden:</span>
                    <div class="inline-flex rounded-lg border border-border overflow-hidden">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['asc' => 'Ascendente', 'desc' => 'Descendente']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir => $dirLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $isDirSelected = $sortDirection === $dir; ?>
                            <button
                                type="button"
                                wire:click="setSortDirection('<?php echo e($dir); ?>')"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'px-3 py-1.5 text-xs font-medium transition-all duration-200',
                                    'bg-accent text-white' => $isDirSelected,
                                    'bg-surface-secondary text-content hover:bg-surface-tertiary' => !$isDirSelected,
                                ]); ?>"
                            >
                                <span class="flex items-center gap-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dir === 'asc'): ?>
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                                        </svg>
                                    <?php else: ?>
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php echo e($dirLabel); ?>

                                </span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="border-t border-border/50"></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($statuses) > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Estado</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array($key, $selectedStatuses); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('status', '<?php echo e($key); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($priorities) > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Prioridad</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array($key, $selectedPriorities); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('priority', '<?php echo e($key); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($deadlineOptions) > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Fecha limite</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $deadlineOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array($key, $selectedDeadlines); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('deadline', '<?php echo e($key); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('type', $extraFilters) && count($types) > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Tipo</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array($key, $selectedTypes); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('type', '<?php echo e($key); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($label); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('category', $extraFilters) && $categories && $categories->count() > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Categoria</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array((string)$cat->id, $selectedCategories); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('category', '<?php echo e($cat->id); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($cat->name); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('creator', $extraFilters) && $users && $users->count() > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Creador</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array((string)$user->id, $selectedCreators); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('creator', '<?php echo e($user->id); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($user->name); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('assignee', $extraFilters) && $users && $users->count() > 0): ?>
            <div>
                <h4 class="text-sm font-medium text-content-secondary mb-2">Responsable</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $isSelected = in_array((string)$user->id, $selectedAssignees); ?>
                        <button
                            type="button"
                            wire:click="toggleFilter('assignee', '<?php echo e($user->id); ?>')"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-3 py-1.5 text-sm font-medium rounded-lg border transition-all duration-200 active:scale-[0.97]',
                                'bg-accent/10 border-accent text-accent' => $isSelected,
                                'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$isSelected,
                            ]); ?>"
                        >
                            <?php echo e($user->name); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
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
<?php /**PATH /var/www/html/resources/views/components/filter-bottom-sheet.blade.php ENDPATH**/ ?>