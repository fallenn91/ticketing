@props(['type', 'size' => 'md'])

@use('App\View\TicketPresentation')

@php
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
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['base']]) }}
      @if(!$showLabel) title="{{ $label }}" @endif>
    <svg class="{{ $iconSize }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">{!! $config['icon'] !!}</svg>
    @if($showLabel){{ $label }}@endif
</span>
