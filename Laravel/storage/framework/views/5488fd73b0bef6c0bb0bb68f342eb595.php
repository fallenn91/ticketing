<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id' => '',
    'name' => '',
    'rows' => 4,
    'placeholder' => '',
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
    'id' => '',
    'name' => '',
    'rows' => 4,
    'placeholder' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<textarea
    id="<?php echo e($id); ?>"
    name="<?php echo e($name); ?>"
    rows="<?php echo e($rows); ?>"
    placeholder="<?php echo e($placeholder); ?>"
    <?php echo e($attributes->merge([
        'class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full'
    ])); ?>

></textarea>
<?php /**PATH /var/www/html/resources/views/components/text-area.blade.php ENDPATH**/ ?>