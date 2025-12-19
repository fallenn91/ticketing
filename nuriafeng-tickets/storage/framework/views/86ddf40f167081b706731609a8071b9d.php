<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label' => 'Más filtros',
    'activeCount' => 0,
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
    'label' => 'Más filtros',
    'activeCount' => 0,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

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
            'bg-accent/10 border-accent/50 text-accent hover:bg-accent/15' => $activeCount > 0,
            'bg-surface-secondary border-border text-content hover:bg-surface-tertiary' => $activeCount === 0,
        ]); ?>"
    >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        <span><?php echo e($label); ?></span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeCount > 0): ?>
            <span class="inline-flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-semibold bg-accent text-white rounded-full">
                <?php echo e($activeCount); ?>

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
        class="fixed p-3 bg-surface border border-border rounded-xl shadow-xl z-[100]"
        :style="`top: ${pos.bottom + 8}px; right: ${window.innerWidth - pos.right}px`"
    >
        <div class="flex flex-wrap items-center gap-2 min-w-64">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/filter-dropdown.blade.php ENDPATH**/ ?>