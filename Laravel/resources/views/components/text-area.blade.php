@props([
    'id' => '',
    'name' => '',
    'rows' => 4,
    'placeholder' => '',
])

<textarea
    id="{{ $id }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full'
    ]) }}
></textarea>
