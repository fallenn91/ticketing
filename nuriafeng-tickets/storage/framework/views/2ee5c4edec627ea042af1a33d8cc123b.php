<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['variant' => 'primary', 'type' => 'button', 'href' => null, 'size' => 'default']));

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

foreach (array_filter((['variant' => 'primary', 'type' => 'button', 'href' => null, 'size' => 'default']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$baseClasses = 'inline-flex items-center justify-center gap-2 font-medium rounded-lg transition-all duration-150 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed active:scale-[0.98] active:transition-transform active:duration-75';

$sizeClasses = match($size) {
    'xs' => 'px-2.5 py-1 text-xs min-w-0',
    'sm' => 'px-3 py-1.5 text-sm min-w-0',
    'compact' => 'px-2.5 sm:px-4 lg:px-5 py-1 sm:py-1.5 lg:py-2 text-xs sm:text-sm lg:text-base min-w-0',
    default => 'px-5 py-2 min-w-[120px]',
};

$classes = match($variant) {
    'primary' => $baseClasses . ' ' . $sizeClasses . ' bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
    'secondary' => $baseClasses . ' ' . $sizeClasses . ' bg-surface-secondary text-content border border-border hover:bg-surface-tertiary hover:border-border/80 focus:outline-none focus:ring-2 focus:ring-indigo-500/30',
    'ghost' => $baseClasses . ' px-3 py-1.5 text-content-secondary hover:bg-surface-secondary hover:text-content',
    'icon' => $baseClasses . ' p-2 bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50',
    'danger' => $baseClasses . ' ' . $sizeClasses . ' bg-red-600 text-white hover:bg-red-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
    default => $baseClasses . ' ' . $sizeClasses . ' bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
};
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($href): ?>
    <a href="<?php echo e($href); ?>" <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <button type="<?php echo e($type); ?>" <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/ui/button.blade.php ENDPATH**/ ?>