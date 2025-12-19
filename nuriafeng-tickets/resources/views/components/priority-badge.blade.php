@props([
    'priority',
    'interactive' => false,
    'wireModel' => null,
    'ticketId' => null,
    'size' => 'md',
])

@use('App\View\TicketPresentation')

@php
use App\Models\Ticket;

$config = TicketPresentation::getPriorityConfig($priority);
$labels = Ticket::PRIORITIES;
$allConfigs = TicketPresentation::PRIORITY_STYLES;
$label = $labels[$priority] ?? $priority;

$sizeClasses = match($size) {
    'icon' => 'p-0',
    'sm' => 'gap-1.5 px-2 py-1 text-[10px]',
    default => 'gap-2 px-3 py-1.5 text-xs',
};

$svgSize = match($size) {
    'icon' => 'w-5 h-5',
    'sm' => 'w-4 h-4',
    default => 'w-4 h-4',
};

$fontSize = match($size) {
    'icon' => '10',
    'sm' => '10',
    default => '9',
};

$showLabel = $size !== 'icon';
$priorityNumber = $config['bars']; // 1-4
@endphp

@if($interactive)
    <x-dropdown-badge :value="$priority" width="w-36">
        <x-slot name="trigger" class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium rounded-full ring inset-ring {{ $config['text'] }} {{ $config['bg'] }} {{ $config['hover'] }}">
            <svg viewBox="0 0 20 20" class="w-4 h-4" x-bind:class="{ 'scale-110': justChanged }">
                <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                <text x="10" y="10" text-anchor="middle" dy="0.35em" fill="currentColor" font-size="9" font-weight="600">{{ $priorityNumber }}</text>
            </svg>
            {{ $labels[$priority] ?? $priority }}
        </x-slot>

        @foreach($labels as $key => $optLabel)
            @php
                $isSelected = $priority === $key;
                $optionConfig = $allConfigs[$key];
                $optNumber = $optionConfig['bars'];
            @endphp
            <button
                type="button"
                @if($wireModel)
                    wire:click="$set('{{ $wireModel }}', '{{ $key }}')"
                @elseif($ticketId)
                    wire:click="updateTicketPriority({{ $ticketId }}, '{{ $key }}')"
                @endif
                @click="selectOption()"
                class="w-full px-3 py-2 text-left text-sm flex items-center gap-2 transition-colors duration-150
                       {{ $isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
            >
                <span class="inline-flex items-center gap-2 {{ $optionConfig['text'] }} {{ $optionConfig['bg'] }} px-2.5 py-1 rounded-full ring inset-ring text-xs">
                    <svg viewBox="0 0 20 20" class="w-4 h-4">
                        <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                        <text x="10" y="10" text-anchor="middle" dy="0.35em" fill="currentColor" font-size="9" font-weight="600">{{ $optNumber }}</text>
                    </svg>
                    {{ $optLabel }}
                </span>
                @if($isSelected)
                    <x-ui.icon-check class="w-4 h-4 ml-auto text-accent" />
                @endif
            </button>
        @endforeach
    </x-dropdown-badge>
@else
    @if($size === 'icon')
        <svg viewBox="0 0 20 20" class="{{ $svgSize }} {{ $config['text'] }}" title="{{ $label }}">
            <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
            <text x="10" y="10" text-anchor="middle" dominant-baseline="central" fill="currentColor" font-size="{{ $fontSize }}" font-weight="600">{{ $priorityNumber }}</text>
        </svg>
    @else
        <span {{ $attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['text'] . ' ' . $config['bg']]) }}>
            <svg viewBox="0 0 20 20" class="{{ $svgSize }}">
                <circle cx="10" cy="10" r="8.5" fill="currentColor" fill-opacity="0.15" stroke="currentColor" stroke-width="1.5"/>
                <text x="10" y="10" text-anchor="middle" dominant-baseline="central" fill="currentColor" font-size="{{ $fontSize }}" font-weight="600">{{ $priorityNumber }}</text>
            </svg>
            {{ $label }}
        </span>
    @endif
@endif
