@props(['disabled' => false, 'rows' => 4, 'label' => null])

<div class="relative">
    @if($label)
        <span class="absolute top-2 left-3.5 text-[10px] uppercase tracking-wider text-content-muted pointer-events-none z-10">
            {{ $label }}
        </span>
    @endif
    <textarea rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'w-full px-3.5 ' . ($label ? 'pt-6 pb-2.5' : 'py-2.5') . ' bg-surface border border-border rounded-lg text-content placeholder:text-content-muted resize-none focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed']) }}>{{ $slot }}</textarea>
</div>
