@props([
    'name',
    'label' => null,
    'type' => 'text',
    'required' => false,
    'placeholder' => '',
    'wireModel' => null,
    'rows' => 3,
    'options' => null,
    'nullLabel' => 'Sin asignar',
])

@php
$model = $wireModel ?? $name;
$hasError = $errors->has($name);
$errorClass = $hasError ? '!border-red-500 !ring-red-500/30' : '';
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'mb-5']) }}>
    @if($type === 'select' && $options)
        <x-ui.custom-select
            label="{{ $label }}"
            :options="$options"
            wireModel="{{ $model }}"
            :value="$this->{$model} ?? null"
            :nullable="!$required"
            :required="$required"
            :hasError="$hasError"
            :nullLabel="$nullLabel"
        />
    @else
        @php
            $displayLabel = $label ? ($required ? $label . ' *' : $label) : null;
        @endphp

        @if($type === 'textarea')
            <x-ui.textarea
                wire:model="{{ $model }}"
                id="{{ $name }}"
                rows="{{ $rows }}"
                placeholder="{{ $placeholder }}"
                :label="$displayLabel"
                class="{{ $errorClass }}"
            >{{ $slot }}</x-ui.textarea>
        @else
            <x-ui.input
                wire:model="{{ $model }}"
                type="{{ $type }}"
                id="{{ $name }}"
                placeholder="{{ $placeholder }}"
                :label="$displayLabel"
                class="{{ $errorClass }}"
            />
        @endif
    @endif

    @error($name)
        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
