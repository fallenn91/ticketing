<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'title' => null,
    'maxHeight' => '85vh',
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
    'name',
    'title' => null,
    'maxHeight' => '85vh',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
    x-data="{
        open: false,
        startY: 0,
        currentY: 0,
        isDragging: false,
        init() {
            this.$watch('open', (val) => {
                document.body.style.overflow = val ? 'hidden' : '';
            });
        },
        startDrag(e) {
            this.isDragging = true;
            this.startY = e.touches ? e.touches[0].clientY : e.clientY;
        },
        onDrag(e) {
            if (!this.isDragging) return;
            this.currentY = (e.touches ? e.touches[0].clientY : e.clientY) - this.startY;
            if (this.currentY < 0) this.currentY = 0;
        },
        endDrag() {
            if (this.currentY > 100) {
                this.open = false;
            }
            this.currentY = 0;
            this.isDragging = false;
        },
        close() {
            this.open = false;
        }
    }"
    @open-<?php echo e($name); ?>-sheet.window="open = true"
    @close-<?php echo e($name); ?>-sheet.window="open = false"
    <?php echo e($attributes->merge(['class' => 'md:hidden'])); ?>

>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($trigger)): ?>
        <div @click="open = true">
            <?php echo e($trigger); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-40"
        x-cloak
    ></div>

    
    <div
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full"
        :style="currentY > 0 ? `transform: translateY(${currentY}px)` : ''"
        class="fixed bottom-0 left-0 right-0 z-50 bg-surface rounded-t-2xl shadow-2xl flex flex-col max-h-[85vh]"
        x-cloak
    >
        
        <div
            class="flex justify-center py-2 cursor-grab active:cursor-grabbing touch-none shrink-0"
            @mousedown="startDrag"
            @mousemove="onDrag"
            @mouseup="endDrag"
            @mouseleave="endDrag"
            @touchstart="startDrag"
            @touchmove="onDrag"
            @touchend="endDrag"
        >
            <div class="w-10 h-1 bg-content-muted/30 rounded-full"></div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($title): ?>
            <div class="flex items-center justify-between px-4 pb-3 border-b border-border shrink-0">
                <h3 class="text-base font-semibold text-content"><?php echo e($title); ?></h3>
                <div class="flex items-center gap-1 -mr-2">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($headerActions)): ?>
                        <?php echo e($headerActions); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <button
                        type="button"
                        @click="open = false"
                        class="p-2 rounded-full text-content-muted hover:text-content hover:bg-surface-secondary transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="flex-1 min-h-0 overflow-y-auto overscroll-contain touch-pan-y">
            <?php echo e($slot); ?>

        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($footer)): ?>
            <div class="shrink-0 border-t border-border bg-surface">
                <?php echo e($footer); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/ui/bottom-sheet.blade.php ENDPATH**/ ?>