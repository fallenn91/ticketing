@props(['label'])

<div class="flex items-center gap-1 sm:gap-1.5 p-1.5 sm:p-3 sm:flex-col sm:items-start sm:gap-1 rounded-md sm:rounded-xl bg-surface-secondary/50" title="{{ $label }}">
    <span class="hidden sm:block text-[11px] sm:text-xs font-medium uppercase tracking-wider text-content-muted">{{ $label }}</span>
    <div class="inline-flex items-center gap-1 sm:gap-1.5 text-xs sm:text-base text-content-secondary">
        @if(isset($icon))
            <span class="shrink-0 [&>svg]:w-3 [&>svg]:h-3 sm:[&>svg]:w-4 sm:[&>svg]:h-4">{{ $icon }}</span>
        @endif
        <span class="whitespace-nowrap">{{ $slot }}</span>
    </div>
</div>
