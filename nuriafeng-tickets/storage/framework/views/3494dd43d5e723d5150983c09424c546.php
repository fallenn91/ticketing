<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['field' => null, 'sortField' => null, 'sortDirection' => 'asc', 'sortable' => true]));

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

foreach (array_filter((['field' => null, 'sortField' => null, 'sortDirection' => 'asc', 'sortable' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$baseClasses = 'px-3 py-3 text-left text-xs font-semibold text-content-secondary uppercase tracking-wider bg-surface-secondary dark:bg-surface-tertiary';
$sortableClasses = $sortable ? 'cursor-pointer hover:bg-surface-tertiary transition-colors' : '';
?>

<th
    <?php if($sortable && $field): ?> wire:click="sortBy('<?php echo e($field); ?>')" <?php endif; ?>
    <?php echo e($attributes->merge(['class' => $baseClasses . ' ' . $sortableClasses])); ?>

>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortable && $field): ?>
        <span class="flex items-center gap-1">
            <?php echo e($slot); ?>

            <svg class="w-4 h-4 shrink-0 <?php echo e($sortField === $field ? 'opacity-100' : 'opacity-0'); ?> <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </span>
    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</th>
<?php /**PATH /var/www/html/resources/views/components/table-header.blade.php ENDPATH**/ ?>