@props(['elevated' => false])

@php
$classes = $elevated
    ? 'bg-surface border border-border rounded-xl shadow-elevated dark:shadow-dark-elevated'
    : 'bg-surface border border-border rounded-xl shadow-soft dark:shadow-dark-soft';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
