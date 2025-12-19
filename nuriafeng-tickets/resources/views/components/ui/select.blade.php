@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'w-full px-3.5 py-2.5 bg-surface border border-border rounded-lg text-content cursor-pointer focus:outline-none focus:ring-2 focus:ring-accent/20 focus:border-accent focus:shadow-sm dark:focus:ring-accent/30 transition-all duration-200 hover:border-border/80 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</select>
