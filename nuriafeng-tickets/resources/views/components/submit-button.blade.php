@props([
    'target',
    'label',
    'loadingLabel' => null,
    'variant' => 'primary',
    'size' => 'default',
])

@php
$loadingLabel = $loadingLabel ?? $label . '...';
@endphp

<x-ui.button
    type="submit"
    :variant="$variant"
    :size="$size"
    wire:loading.attr="disabled"
    wire:target="{{ $target }}"
    {{ $attributes }}
>
    <span wire:loading.remove wire:target="{{ $target }}">{{ $label }}</span>
    <x-loading-spinner wire:loading wire:target="{{ $target }}" size="sm" />
    <span wire:loading wire:target="{{ $target }}">{{ $loadingLabel }}</span>
</x-ui.button>
