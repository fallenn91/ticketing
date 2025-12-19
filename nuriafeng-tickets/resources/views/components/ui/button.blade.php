@props(['variant' => 'primary', 'type' => 'button', 'href' => null, 'size' => 'default'])

@php
$baseClasses = 'inline-flex items-center justify-center gap-2 font-medium rounded-lg transition-all duration-150 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed active:scale-[0.98] active:transition-transform active:duration-75';

$sizeClasses = match($size) {
    'xs' => 'px-2.5 py-1 text-xs min-w-0',
    'sm' => 'px-3 py-1.5 text-sm min-w-0',
    'compact' => 'px-2.5 sm:px-4 lg:px-5 py-1 sm:py-1.5 lg:py-2 text-xs sm:text-sm lg:text-base min-w-0',
    default => 'px-5 py-2 min-w-[120px]',
};

$classes = match($variant) {
    'primary' => $baseClasses . ' ' . $sizeClasses . ' bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
    'secondary' => $baseClasses . ' ' . $sizeClasses . ' bg-surface-secondary text-content border border-border hover:bg-surface-tertiary hover:border-border/80 focus:outline-none focus:ring-2 focus:ring-indigo-500/30',
    'ghost' => $baseClasses . ' px-3 py-1.5 text-content-secondary hover:bg-surface-secondary hover:text-content',
    'icon' => $baseClasses . ' p-2 bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50',
    'danger' => $baseClasses . ' ' . $sizeClasses . ' bg-red-600 text-white hover:bg-red-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
    default => $baseClasses . ' ' . $sizeClasses . ' bg-accent text-white hover:bg-accent-hover hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2 dark:focus:ring-offset-slate-900',
};
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
