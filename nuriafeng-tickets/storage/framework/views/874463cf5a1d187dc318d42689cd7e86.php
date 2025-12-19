<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'priority',
    'interactive' => false,
    'wireModel' => null,
    'ticketId' => null,
    'size' => 'md',
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
    'priority',
    'interactive' => false,
    'wireModel' => null,
    'ticketId' => null,
    'size' => 'md',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php use \App\View\TicketPresentation; ?>

<?php
use App\Models\Ticket;

$config = TicketPresentation::getPriorityConfig($priority);
$labels = Ticket::PRIORITIES;
$allConfigs = TicketPresentation::PRIORITY_STYLES;
$label = $labels[$priority] ?? $priority;

$sizeClasses = match($size) {
    'icon' => 'p-0',
    'sm' => 'gap-1.5 px-2 py-1 text-[10px]',
    default => 'gap-2 px-3 py-1.5 text-xs',
};

$svgSize = match($size) {
    'icon' => 'w-5 h-5',
    'sm' => 'w-4 h-4',
    default => 'w-4 h-4',
};

$fontSize = match($size) {
    'icon' => '10',
    'sm' => '10',
    default => '9',
};

$showLabel = $size !== 'icon';
$priorityNumber = $config['bars']; // 1-4
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($interactive): ?>
    <?php if (isset($component)) { $__componentOriginal81aeb9738e816d29b69accd1ba6e1111 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81aeb9738e816d29b69accd1ba6e1111 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-badge','data' => ['value' => $priority,'width' => 'w-36']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priority),'width' => 'w-36']); ?>
         <?php $__env->slot('trigger', null, ['class' => 'inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium rounded-full ring inset-ring '.e($config['text']).' '.e($config['bg']).' '.e($config['hover']).'']); ?> 
            <svg viewBox="0 0 20 20" class="w-4 h-4" x-bind:class="{ 'scale-110': justChanged }">
                <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                <text x="10" y="10" text-anchor="middle" dy="0.35em" fill="currentColor" font-size="9" font-weight="600"><?php echo e($priorityNumber); ?></text>
            </svg>
            <?php echo e($labels[$priority] ?? $priority); ?>

         <?php $__env->endSlot(); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $optLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $isSelected = $priority === $key;
                $optionConfig = $allConfigs[$key];
                $optNumber = $optionConfig['bars'];
            ?>
            <button
                type="button"
                <?php if($wireModel): ?>
                    wire:click="$set('<?php echo e($wireModel); ?>', '<?php echo e($key); ?>')"
                <?php elseif($ticketId): ?>
                    wire:click="updateTicketPriority(<?php echo e($ticketId); ?>, '<?php echo e($key); ?>')"
                <?php endif; ?>
                @click="selectOption()"
                class="w-full px-3 py-2 text-left text-sm flex items-center gap-2 transition-colors duration-150
                       <?php echo e($isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
            >
                <span class="inline-flex items-center gap-2 <?php echo e($optionConfig['text']); ?> <?php echo e($optionConfig['bg']); ?> px-2.5 py-1 rounded-full ring inset-ring text-xs">
                    <svg viewBox="0 0 20 20" class="w-4 h-4">
                        <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                        <text x="10" y="10" text-anchor="middle" dy="0.35em" fill="currentColor" font-size="9" font-weight="600"><?php echo e($optNumber); ?></text>
                    </svg>
                    <?php echo e($optLabel); ?>

                </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSelected): ?>
                    <?php if (isset($component)) { $__componentOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd907af6845fc7e9aaf3f3a4757605c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon-check','data' => ['class' => 'w-4 h-4 ml-auto text-accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 ml-auto text-accent']); ?>
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
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81aeb9738e816d29b69accd1ba6e1111)): ?>
<?php $attributes = $__attributesOriginal81aeb9738e816d29b69accd1ba6e1111; ?>
<?php unset($__attributesOriginal81aeb9738e816d29b69accd1ba6e1111); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81aeb9738e816d29b69accd1ba6e1111)): ?>
<?php $component = $__componentOriginal81aeb9738e816d29b69accd1ba6e1111; ?>
<?php unset($__componentOriginal81aeb9738e816d29b69accd1ba6e1111); ?>
<?php endif; ?>
<?php else: ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($size === 'icon'): ?>
        <svg viewBox="0 0 20 20" class="<?php echo e($svgSize); ?> <?php echo e($config['text']); ?>" title="<?php echo e($label); ?>">
            <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
            <text x="10" y="10" text-anchor="middle" dominant-baseline="central" fill="currentColor" font-size="<?php echo e($fontSize); ?>" font-weight="600"><?php echo e($priorityNumber); ?></text>
        </svg>
    <?php else: ?>
        <span <?php echo e($attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['text'] . ' ' . $config['bg']])); ?>>
            <svg viewBox="0 0 20 20" class="<?php echo e($svgSize); ?>">
                <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                <text x="10" y="10" text-anchor="middle" dominant-baseline="central" fill="currentColor" font-size="<?php echo e($fontSize); ?>" font-weight="600"><?php echo e($priorityNumber); ?></text>
            </svg>
            <?php echo e($label); ?>

        </span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/priority-badge.blade.php ENDPATH**/ ?>