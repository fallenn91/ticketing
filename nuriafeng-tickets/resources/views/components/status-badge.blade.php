@props([
    'status',
    'interactive' => false,
    'wireModel' => null,
    'ticketId' => null,
    'size' => 'md',
])

@use('App\View\TicketPresentation')

@php
use App\Models\Ticket;

$config = TicketPresentation::getStatusConfig($status);
$labels = Ticket::STATUSES;
$allConfigs = TicketPresentation::STATUS_STYLES;
$label = $labels[$status] ?? $status;

$sizeClasses = match($size) {
    'icon' => 'p-1',
    'sm' => 'gap-1 px-1.5 py-0.5 text-[10px]',
    default => 'gap-1.5 px-2.5 py-1.5 text-xs',
};

$iconSize = match($size) {
    'icon' => 'w-2.5 h-2.5',
    'sm' => 'w-2 h-2',
    default => 'w-3 h-3',
};

$showLabel = $size !== 'icon';
@endphp

@if($interactive)
    <x-dropdown-badge :value="$status" width="w-40">
        <x-slot name="trigger" class="inline-flex items-center gap-1.5 px-2.5 py-1.5 text-xs font-medium rounded-full ring inset-ring {{ $config['base'] }} {{ $config['hover'] }}">
            <svg class="w-3 h-3 transition-transform duration-200" x-bind:class="{ 'scale-110': justChanged }" viewBox="0 0 12 12" fill="none">{!! $config['icon'] !!}</svg>
            {{ $labels[$status] ?? $status }}
        </x-slot>

        @foreach($labels as $key => $label)
            @php
                $isSelected = $status === $key;
                $optionConfig = $allConfigs[$key];
            @endphp
            <button
                type="button"
                @if($wireModel)
                    wire:click="$set('{{ $wireModel }}', '{{ $key }}')"
                @elseif($ticketId)
                    wire:click="updateTicketStatus({{ $ticketId }}, '{{ $key }}')"
                @endif
                @click="selectOption()"
                class="w-full px-3 py-2 text-left text-sm flex items-center gap-2 transition-colors duration-150
                       {{ $isSelected ? 'bg-surface-tertiary font-medium' : 'hover:bg-surface-secondary' }}"
            >
                <span class="inline-flex items-center gap-1.5 {{ $optionConfig['base'] }} px-2 py-0.5 rounded-full ring inset-ring text-xs">
                    <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none">{!! $optionConfig['icon'] !!}</svg>
                    {{ $label }}
                </span>
                @if($isSelected)
                    <x-ui.icon-check class="w-4 h-4 ml-auto text-accent" />
                @endif
            </button>
        @endforeach
    </x-dropdown-badge>
@else
    <span {{ $attributes->merge(['class' => 'inline-flex items-center font-medium rounded-full ring inset-ring ' . $sizeClasses . ' ' . $config['base']]) }}
          @if(!$showLabel) title="{{ $label }}" @endif>
        <svg class="{{ $iconSize }}" viewBox="0 0 12 12" fill="none">{!! $config['icon'] !!}</svg>
        @if($showLabel){{ $label }}@endif
    </span>
@endif
