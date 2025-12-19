@props(['icon' => 'inbox', 'title', 'description' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 text-center']) }}>
    <div class="w-12 h-12 mb-4 text-content-muted animate-stagger-fade-up" style="animation-delay: 0ms">
        @if($icon === 'inbox')
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="animate-bounce-sm" style="animation-delay: 200ms">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        @elseif($icon === 'search')
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="animate-bounce-sm" style="animation-delay: 200ms">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        @elseif($icon === 'ticket')
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="animate-bounce-sm" style="animation-delay: 200ms">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
        </svg>
        @elseif($icon === 'comment')
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="animate-bounce-sm" style="animation-delay: 200ms">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        @endif
    </div>
    <h3 class="text-base font-semibold text-content animate-stagger-fade-up" style="animation-delay: 75ms">{{ $title }}</h3>
    @if($description)
    <p class="mt-1 text-sm text-content-secondary max-w-sm animate-stagger-fade-up" style="animation-delay: 150ms">{{ $description }}</p>
    @endif
    @if($slot->isNotEmpty())
    <div class="mt-4 animate-stagger-fade-up" style="animation-delay: 225ms">{{ $slot }}</div>
    @endif
</div>
