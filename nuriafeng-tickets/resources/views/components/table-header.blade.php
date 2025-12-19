@props(['field' => null, 'sortField' => null, 'sortDirection' => 'asc', 'sortable' => true])

@php
$baseClasses = 'px-3 py-3 text-left text-xs font-semibold text-content-secondary uppercase tracking-wider bg-surface-secondary dark:bg-surface-tertiary';
$sortableClasses = $sortable ? 'cursor-pointer hover:bg-surface-tertiary transition-colors' : '';
@endphp

<th
    @if($sortable && $field) wire:click="sortBy('{{ $field }}')" @endif
    {{ $attributes->merge(['class' => $baseClasses . ' ' . $sortableClasses]) }}
>
    @if($sortable && $field)
        <span class="flex items-center gap-1">
            {{ $slot }}
            <svg class="w-4 h-4 shrink-0 {{ $sortField === $field ? 'opacity-100' : 'opacity-0' }} {{ $sortDirection === 'asc' ? '' : 'rotate-180' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </span>
    @else
        {{ $slot }}
    @endif
</th>
