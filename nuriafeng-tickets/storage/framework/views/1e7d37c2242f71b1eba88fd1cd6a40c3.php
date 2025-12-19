<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'options' => [],
    'wireModel',
    'value' => [],
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
    'label',
    'options' => [],
    'wireModel',
    'value' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $selectedValues = is_array($value) ? $value : ($value ? [$value] : []);
    $hasValue = count($selectedValues) > 0;
    $selectedCount = count($selectedValues);
?>

<div
    x-data="{ open: false, pos: {} }"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    class="relative shrink-0"
>
    <button
        type="button"
        x-ref="btn"
        @click="pos = $refs.btn.getBoundingClientRect(); open = !open"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-full border transition-all duration-200 whitespace-nowrap active:scale-[0.97]',
            'bg-accent/10 border-accent/50 text-accent hover:bg-accent/15' => $hasValue,
            'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => !$hasValue,
        ]); ?>"
    >
        <span><?php echo e($label); ?></span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCount > 0): ?>
            <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                <?php echo e($selectedCount); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div
        x-show="open"
        x-transition.opacity.duration.150ms
        x-cloak
        class="fixed min-w-48 max-h-72 overflow-y-auto bg-surface border border-border rounded-xl shadow-xl z-[100]"
        :style="`top: ${pos.bottom + 8}px; left: ${pos.left}px`"
    >
        <div class="py-1.5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $isSelected = in_array($key, $selectedValues); ?>
                <button
                    type="button"
                    wire:click="toggleFilter('<?php echo e($wireModel); ?>', '<?php echo e($key); ?>')"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'w-full px-3.5 py-2.5 text-left text-sm flex items-center gap-3 transition-colors',
                        'bg-accent/10 text-accent' => $isSelected,
                        'text-content hover:bg-surface-secondary' => !$isSelected,
                    ]); ?>"
                >
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'shrink-0 w-4 h-4 rounded border-2 flex items-center justify-center transition-colors',
                        'bg-accent border-accent' => $isSelected,
                        'border-content-muted/50' => !$isSelected,
                    ]); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSelected): ?>
                            <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-2.5 h-2.5 text-white','strokeWidth' => '3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-2.5 h-2.5 text-white','strokeWidth' => '3']); ?>
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
                    </span>
                    <span class="<?php echo e($isSelected ? 'font-medium' : ''); ?>"><?php echo e($optionLabel); ?></span>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasValue): ?>
                <div class="border-t border-border/50 mt-1.5 pt-1.5">
                    <button
                        type="button"
                        wire:click="clearFilter('<?php echo e($wireModel); ?>')"
                        @click="open = false"
                        class="w-full px-3.5 py-2.5 text-left text-sm text-content-muted hover:text-content hover:bg-surface-secondary transition-colors flex items-center gap-2"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Limpiar filtro
                    </button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/filter-chip.blade.php ENDPATH**/ ?>