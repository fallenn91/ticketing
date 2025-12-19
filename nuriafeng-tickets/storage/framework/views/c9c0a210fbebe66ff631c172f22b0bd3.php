<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['disabled' => false, 'label' => null]));

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

foreach (array_filter((['disabled' => false, 'label' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label): ?>
<div class="relative" x-data="{ focused: false, get filled() { return this.$refs.input?.value?.length > 0 } }">
    <span class="absolute top-2 left-3.5 text-[10px] uppercase tracking-wider text-content-muted pointer-events-none">
        <?php echo e($label); ?>

    </span>
    <input x-ref="input" @focus="focused = true" @blur="focused = false"
        <?php echo e($disabled ? 'disabled' : ''); ?>

        <?php echo e($attributes->merge(['class' => 'w-full px-3.5 pt-6 pb-2.5 bg-surface border border-border rounded-lg text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed'])); ?>>
</div>
<?php else: ?>
<input <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo e($attributes->merge(['class' => 'w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed'])); ?>>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/ui/input.blade.php ENDPATH**/ ?>