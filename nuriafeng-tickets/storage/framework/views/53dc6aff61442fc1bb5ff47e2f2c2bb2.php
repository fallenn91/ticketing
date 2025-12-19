<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'status',
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
    'status',
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

$config = TicketPresentation::getStatusConfig($status);
$labels = Ticket::STATUSES;
$allConfigs = TicketPresentation::STATUS_STYLES;
$label = $labels[$status] ?? $status;

$sizeClasses = match($size) {
    'icon' => 'p-1',
    'sm' => 'gap-1 px-1.5 py-0.5 text-[10px]',
    default => 'gap-1.5 px-2.5 py-1.5 text-xs',
};

$iconSize = match($size) {
    'icon' => 'w-2.5 h-2.5',
    'sm' => 'w-2 h-2',
    default => 'w-3 h-3',
};

$showLabel = $size !== 'icon';
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($interactive): ?>
    <?php if (isset($component)) { $__componentOriginal81aeb9738e816d29b69accd1ba6e1111 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81aeb9738e816d29b69accd1ba6e1111 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-badge','data' => ['value' => $status,'width' => 'w-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status),'width' => 'w-40']); ?>
         <?php $__env->slot('trigger', null, ['class' => 'inline-flex items-center gap-1.5 px-2.5 py-1.5 text-xs font-medium rounded-full ring inset-ring '.e($config['base']).' '.e($config['hover']).'']); ?> 
            <svg class="w-3 h-3 transition-transform duration-200" x-bind:class="{ 'scale-110': justChanged }" viewBox="0 0 12 12" fill="none"><?php echo $config['icon']; ?></svg>
            <?php echo e($labels[$status] ?? $status); ?>

         <?php $__env->endSlot(); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $isSelected = $status === $key;
                $optionConfig = $allConfigs[$key];
            ?>
            <button
                type="button"
                <?php if($wireModel): ?>
                    wire:click="$set('<?php echo e($wireModel); ?>', '<?php echo e($key); ?>')"
                <?php elseif($ticketId): ?>
                    wire:click="updateTicketStatus(<?php echo e($ticketId); ?>, '<?php echo e($key); ?>')"
                <?php endif; ?>
                @click="selectOption()"
                class="w-full px-3 py-2 text-left text-sm flex items-center gap-2 transition-colors duration-150
                       <?php echo e($isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary'); ?>"
            >
                <span class="inline-flex items-center gap-1.5 <?php echo e($optionConfig['base']); ?> px-2 py-0.5 rounded-full ring inset-ring text-xs">
                    <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none"><?php echo $optionConfig['icon']; ?></svg>
                    <?php echo e($label); ?>

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
    <span <?php echo e($attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['base']])); ?>

          <?php if(!$showLabel): ?> title="<?php echo e($label); ?>" <?php endif; ?>>
        <svg class="<?php echo e($iconSize); ?>" viewBox="0 0 12 12" fill="none"><?php echo $config['icon']; ?></svg>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showLabel): ?><?php echo e($label); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/status-badge.blade.php ENDPATH**/ ?>