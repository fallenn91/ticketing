@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-accent hover:text-accent-hover transition-colors duration-150']) }}>
    {{ $slot }}
</a>
