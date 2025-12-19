@props(['attachments', 'size' => 'default'])

@php
$gridClass = 'gap-2';
$itemClass = $size === 'small' ? 'p-2 sm:p-2.5' : 'p-2 sm:p-3';
$iconSize = $size === 'small' ? 'w-6 h-6 sm:w-8 sm:h-8' : 'w-8 h-8 sm:w-10 sm:h-10';
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 {{ $gridClass }}">
    @foreach($attachments as $attachment)
        <a href="{{ route('attachments.download', $attachment) }}"
           class="flex items-center gap-2 sm:gap-3 {{ $itemClass }} bg-surface border border-border rounded-lg hover:bg-surface-secondary hover:border-accent/30 transition-all duration-200 group"
           title="Descargar {{ $attachment->original_name }}">
            <x-attachment-icon :type="$attachment->icon_type" class="{{ $iconSize }} shrink-0" />
            <div class="min-w-0 flex-1">
                <p class="text-xs sm:text-sm font-medium text-content truncate group-hover:text-accent transition-colors">
                    {{ $attachment->original_name }}
                </p>
                <p class="text-[10px] sm:text-xs text-content-muted">
                    {{ $attachment->formatted_size }}
                </p>
            </div>
            <div class="hidden sm:block shrink-0 p-1.5 rounded-lg text-content-muted group-hover:text-accent group-hover:bg-accent/10 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </div>
        </a>
    @endforeach
</div>
