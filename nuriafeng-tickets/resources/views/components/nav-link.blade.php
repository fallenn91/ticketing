@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-accent/10 text-accent transition-all duration-200'
    : 'inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium text-content-secondary hover:text-content hover:bg-surface-tertiary/50 transition-all duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
