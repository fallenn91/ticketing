@props(['title' => null, 'backRoute' => null])

<div class="flex items-center justify-between">
    <div class="flex items-center gap-3">
        @if($backRoute)
            <a href="{{ $backRoute }}" class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-content-muted hover:text-content hover:bg-surface-tertiary transition-colors group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="text-sm font-medium">Volver</span>
            </a>
        @endif
        @if($title)
            <h1 class="font-semibold text-xl text-content leading-tight">
                {{ $title }}
            </h1>
        @endif
    </div>
    {{ $slot ?? '' }}
</div>
