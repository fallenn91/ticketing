<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <div class="flex items-center gap-3">
            @if(isset($icon))
                <div class="shrink-0 w-10 h-10 rounded-xl bg-accent/10 flex items-center justify-center text-accent">
                    {{ $icon }}
                </div>
            @endif
            <h3 class="text-lg font-semibold text-content">{{ $title }}</h3>
        </div>

        <p class="mt-2 text-sm text-content-muted {{ isset($icon) ? 'ml-13' : '' }}">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
