<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label']));

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

foreach (array_filter((['label']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50" title="<?php echo e($label); ?>">
    <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted"><?php echo e($label); ?></span>
    <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($icon)): ?>
            <span class="shrink-0 [&>svg]:w-3 [&>svg]:h-3 sm:[&>svg]:w-4 sm:[&>svg]:h-4"><?php echo e($icon); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <span class="whitespace-nowrap"><?php echo e($slot); ?></span>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/ticket-metadata/field.blade.php ENDPATH**/ ?>