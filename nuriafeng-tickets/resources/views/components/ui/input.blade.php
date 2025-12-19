@props(['disabled' => false, 'label' => null])

@if($label)
<div class="relative" x-data="{ focused: false, get filled() { return this.$refs.input?.value?.length > 0 } }">
    <span class="absolute top-2 left-3.5 text-[10px] uppercase tracking-wider text-content-muted pointer-events-none">
        {{ $label }}
    </span>
    <input x-ref="input" @focus="focused = true" @blur="focused = false"
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => 'w-full px-3.5 pt-6 pb-2.5 bg-surface border border-border rounded-lg text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
</div>
@else
<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
@endif
