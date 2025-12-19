<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['date', 'live' => true, 'resetEvent' => null, 'short' => false]));

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

foreach (array_filter((['date', 'live' => true, 'resetEvent' => null, 'short' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$timestamp = $date->timestamp;
$widthClass = $short ? '' : 'min-w-32 whitespace-nowrap';

if ($short) {
    $diff = $date->diffInSeconds(now());
    if ($diff < 60) {
        $initial = $diff . 's';
    } elseif ($diff < 3600) {
        $initial = floor($diff / 60) . 'min';
    } elseif ($diff < 86400) {
        $initial = floor($diff / 3600) . 'h';
    } else {
        $initial = floor($diff / 86400) . 'd';
    }
} else {
    $initial = $date->diffForHumans();
}
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($live): ?>
<span
    x-data="{
        timestamp: <?php echo e($timestamp); ?>,
        display: '<?php echo e($initial); ?>',
        short: <?php echo e($short ? 'true' : 'false'); ?>,
        update() {
            const seconds = Math.floor(Date.now() / 1000) - this.timestamp;
            if (this.short) {
                if (seconds < 60) {
                    this.display = seconds + 's';
                } else if (seconds < 3600) {
                    this.display = Math.floor(seconds / 60) + 'min';
                } else if (seconds < 86400) {
                    this.display = Math.floor(seconds / 3600) + 'h';
                } else {
                    this.display = Math.floor(seconds / 86400) + 'd';
                }
            } else {
                if (seconds < 60) {
                    this.display = seconds <= 1 ? 'hace 1 segundo' : 'hace ' + seconds + ' segundos';
                } else if (seconds < 3600) {
                    const mins = Math.floor(seconds / 60);
                    this.display = mins === 1 ? 'hace 1 minuto' : 'hace ' + mins + ' minutos';
                } else if (seconds < 86400) {
                    const hours = Math.floor(seconds / 3600);
                    this.display = hours === 1 ? 'hace 1 hora' : 'hace ' + hours + ' horas';
                } else {
                    const days = Math.floor(seconds / 86400);
                    this.display = days === 1 ? 'hace 1 día' : 'hace ' + days + ' días';
                }
            }
        }
    }"
    x-on:relative-time-tick.window="update()"
    <?php if($resetEvent): ?>
    x-on:<?php echo e($resetEvent); ?>.window="timestamp = Math.floor(Date.now() / 1000); update()"
    <?php endif; ?>
    <?php echo e($attributes->merge(['class' => 'inline-block ' . $widthClass])); ?>

    x-text="display"
></span>
<?php else: ?>
<span <?php echo e($attributes->merge(['class' => 'inline-block ' . $widthClass])); ?>><?php echo e($initial); ?></span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if (! $__env->hasRenderedOnce('d416d009-6bf7-4ec2-bffa-08bcb7a133f6')): $__env->markAsRenderedOnce('d416d009-6bf7-4ec2-bffa-08bcb7a133f6'); ?>
<script>
(function() {
    if (window.__relativeTimeTicker) return;
    window.__relativeTimeTicker = setInterval(() => {
        window.dispatchEvent(new CustomEvent('relative-time-tick'));
    }, 1000);
})();
</script>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/relative-time.blade.php ENDPATH**/ ?>