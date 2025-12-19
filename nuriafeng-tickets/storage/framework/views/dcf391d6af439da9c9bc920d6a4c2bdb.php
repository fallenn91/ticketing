<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'value',
    'width' => 'w-40',
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
    'value',
    'width' => 'w-40',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div x-data="{
        open: false,
        justChanged: false,
        pos: { top: 0, left: 0 },
        updatePosition() {
            const rect = $refs.trigger.getBoundingClientRect();
            const padding = 8;
            let left = rect.left;

            // Ajustar después de que el dropdown se renderice para obtener su ancho real
            $nextTick(() => {
                if ($refs.dropdown) {
                    const dropdownWidth = $refs.dropdown.offsetWidth;
                    const viewportWidth = window.innerWidth;

                    // Si se sale por la derecha, alinear al borde derecho del trigger
                    if (left + dropdownWidth > viewportWidth - padding) {
                        left = Math.max(padding, rect.right - dropdownWidth);
                        this.pos = { ...this.pos, left: left };
                    }
                }
            });

            this.pos = { top: rect.bottom + 6, left: left };
        },
        selectOption() {
            this.open = false;
            this.justChanged = true;
            setTimeout(() => this.justChanged = false, 600);
        }
     }"
     @click.outside="open = false"
     @keydown.escape.window="open = false"
     class="relative inline-block">

    <button
        type="button"
        x-ref="trigger"
        @click="updatePosition(); open = !open"
        :class="{ 'ring-2 ring-accent/30': justChanged }"
        <?php echo e($trigger->attributes->merge(['class' => 'cursor-pointer transition-all duration-200 active:scale-[0.97]'])); ?>

    >
        <?php echo e($trigger); ?>

        <svg class="w-3 h-3 ml-0.5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div
        x-ref="dropdown"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        x-cloak
        class="fixed <?php echo e($width); ?> bg-surface border border-border rounded-xl shadow-xl shadow-black/10 dark:shadow-black/30 z-[100] overflow-hidden"
        :style="`top: ${pos.top}px; left: ${pos.left}px`"
    >
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/dropdown-badge.blade.php ENDPATH**/ ?>