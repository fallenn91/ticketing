<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type', 'size' => 'md']));

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

foreach (array_filter((['type', 'size' => 'md']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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

$config = TicketPresentation::getTypeConfig($type);
$labels = Ticket::TYPES;
$label = $labels[$type] ?? $type;

$sizeClasses = match($size) {
    'icon' => 'p-1',
    'sm' => 'gap-1 px-1.5 py-0.5 text-[10px]',
    default => 'gap-1.5 px-2.5 py-1.5 text-xs',
};

$iconSize = match($size) {
    'icon' => 'w-3 h-3',
    'sm' => 'w-2.5 h-2.5',
    default => 'w-3.5 h-3.5',
};

$showLabel = $size !== 'icon';
?>

<span <?php echo e($attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['base']])); ?>

      <?php if(!$showLabel): ?> title="<?php echo e($label); ?>" <?php endif; ?>>
    <svg class="<?php echo e($iconSize); ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><?php echo $config['icon']; ?></svg>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showLabel): ?><?php echo e($label); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</span>
<?php /**PATH /var/www/html/resources/views/components/ticket-type-badge.blade.php ENDPATH**/ ?>