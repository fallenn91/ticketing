<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'total',
    'showStats' => false,
    'stats' => [],
    'status' => [],
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
    'title',
    'total',
    'showStats' => false,
    'stats' => [],
    'status' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="mb-6">
    
    <div class="hidden lg:flex lg:items-center lg:gap-6">
        <div class="flex items-center gap-4 flex-1">
            <h3 class="text-lg font-semibold text-content"><?php echo e($title); ?></h3>
            <span class="text-sm text-content-muted"><?php echo e($total); ?> <?php echo e($total === 1 ? 'ticket' : 'tickets'); ?></span>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0)): ?>
            <div class="flex items-center gap-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['abierto'] ?? 0) > 0): ?>
                <button wire:click="toggleFilter('status', 'abierto')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-500/20 transition-colors cursor-pointer <?php echo e(in_array('abierto', $status) ? 'ring-2 ring-blue-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    <?php echo e($stats['abierto']); ?> abiertos
                </button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['en_proceso'] ?? 0) > 0): ?>
                <button wire:click="toggleFilter('status', 'en_proceso')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors cursor-pointer <?php echo e(in_array('en_proceso', $status) ? 'ring-2 ring-amber-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    <?php echo e($stats['en_proceso']); ?> en proceso
                </button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['resuelto'] ?? 0) > 0): ?>
                <button wire:click="toggleFilter('status', 'resuelto')"
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors cursor-pointer <?php echo e(in_array('resuelto', $status) ? 'ring-2 ring-emerald-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    <?php echo e($stats['resuelto']); ?> resueltos
                </button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => route('tickets.create'),'class' => 'shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tickets.create')),'class' => 'shrink-0']); ?>
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <span>Nuevo Ticket</span>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
    </div>

    
    <div class="hidden sm:flex sm:flex-col lg:hidden gap-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-lg font-semibold text-content"><?php echo e($title); ?></h3>
                <span class="text-sm text-content-muted"><?php echo e($total); ?> <?php echo e($total === 1 ? 'ticket' : 'tickets'); ?></span>
            </div>
            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['href' => route('tickets.create'),'class' => 'shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tickets.create')),'class' => 'shrink-0']); ?>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Nuevo Ticket</span>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0)): ?>
        <div class="flex items-center gap-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['abierto'] ?? 0) > 0): ?>
            <button wire:click="toggleFilter('status', 'abierto')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-500/20 transition-colors cursor-pointer <?php echo e(in_array('abierto', $status) ? 'ring-2 ring-blue-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                <?php echo e($stats['abierto']); ?> abiertos
            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['en_proceso'] ?? 0) > 0): ?>
            <button wire:click="toggleFilter('status', 'en_proceso')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors cursor-pointer <?php echo e(in_array('en_proceso', $status) ? 'ring-2 ring-amber-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                <?php echo e($stats['en_proceso']); ?> en proceso
            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['resuelto'] ?? 0) > 0): ?>
            <button wire:click="toggleFilter('status', 'resuelto')"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors cursor-pointer <?php echo e(in_array('resuelto', $status) ? 'ring-2 ring-emerald-500 ring-offset-1 dark:ring-offset-gray-900' : ''); ?>">
                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                <?php echo e($stats['resuelto']); ?> resueltos
            </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="flex flex-col gap-3 sm:hidden">
        
        <div class="flex items-center justify-between gap-4">
            <h3 class="text-lg font-semibold text-content truncate"><?php echo e($title); ?></h3>
            <?php if (isset($component)) { $__componentOriginal2c87ebf539427d59172ec176cf809196 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c87ebf539427d59172ec176cf809196 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.new-ticket-button','data' => ['class' => 'shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.new-ticket-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c87ebf539427d59172ec176cf809196)): ?>
<?php $attributes = $__attributesOriginal2c87ebf539427d59172ec176cf809196; ?>
<?php unset($__attributesOriginal2c87ebf539427d59172ec176cf809196); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c87ebf539427d59172ec176cf809196)): ?>
<?php $component = $__componentOriginal2c87ebf539427d59172ec176cf809196; ?>
<?php unset($__componentOriginal2c87ebf539427d59172ec176cf809196); ?>
<?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showStats && (($stats['abierto'] ?? 0) > 0 || ($stats['en_proceso'] ?? 0) > 0 || ($stats['resuelto'] ?? 0) > 0)): ?>
            <div class="flex items-baseline gap-2 text-sm">
                <span class="text-content-muted"><?php echo e($total); ?> <?php echo e($total === 1 ? 'ticket' : 'tickets'); ?></span>
                <span class="text-content-muted/30">·</span>
                <div class="flex items-baseline gap-1 font-medium">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['abierto'] ?? 0) > 0): ?>
                        <button wire:click="toggleFilter('status', 'abierto')"
                                class="text-blue-600 dark:text-blue-400 hover:underline <?php echo e(in_array('abierto', $status) ? 'font-bold' : ''); ?>">
                            <?php echo e($stats['abierto']); ?>A
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['en_proceso'] ?? 0) > 0): ?>
                        <span class="text-content-muted/50">·</span>
                        <button wire:click="toggleFilter('status', 'en_proceso')"
                                class="text-amber-600 dark:text-amber-400 hover:underline <?php echo e(in_array('en_proceso', $status) ? 'font-bold' : ''); ?>">
                            <?php echo e($stats['en_proceso']); ?>P
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($stats['resuelto'] ?? 0) > 0): ?>
                        <span class="text-content-muted/50">·</span>
                        <button wire:click="toggleFilter('status', 'resuelto')"
                                class="text-emerald-600 dark:text-emerald-400 hover:underline <?php echo e(in_array('resuelto', $status) ? 'font-bold' : ''); ?>">
                            <?php echo e($stats['resuelto']); ?>R
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <span class="text-sm text-content-muted"><?php echo e($total); ?> <?php echo e($total === 1 ? 'ticket' : 'tickets'); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/tickets-header.blade.php ENDPATH**/ ?>