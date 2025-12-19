@props([
    'name',
    'title' => null,
    'maxHeight' => '85vh',
])

<div
    x-data="{
        open: false,
        startY: 0,
        currentY: 0,
        isDragging: false,
        init() {
            this.$watch('open', (val) => {
                document.body.style.overflow = val ? 'hidden' : '';
            });
        },
        startDrag(e) {
            this.isDragging = true;
            this.startY = e.touches ? e.touches[0].clientY : e.clientY;
        },
        onDrag(e) {
            if (!this.isDragging) return;
            this.currentY = (e.touches ? e.touches[0].clientY : e.clientY) - this.startY;
            if (this.currentY < 0) this.currentY = 0;
        },
        endDrag() {
            if (this.currentY > 100) {
                this.open = false;
            }
            this.currentY = 0;
            this.isDragging = false;
        },
        close() {
            this.open = false;
        }
    }"
    @open-{{ $name }}-sheet.window="open = true"
    @close-{{ $name }}-sheet.window="open = false"
    {{ $attributes->merge(['class' => 'md:hidden']) }}
>
    {{-- Trigger slot opcional --}}
    @if(isset($trigger))
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endif

    {{-- Backdrop --}}
    <div
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-40"
        x-cloak
    ></div>

    {{-- Bottom Sheet --}}
    <div
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full"
        :style="currentY > 0 ? `transform: translateY(${currentY}px)` : ''"
        class="fixed bottom-0 left-0 right-0 z-50 bg-surface rounded-t-2xl shadow-2xl flex flex-col max-h-[85vh]"
        x-cloak
    >
        {{-- Drag handle --}}
        <div
            class="flex justify-center py-2 cursor-grab active:cursor-grabbing touch-none shrink-0"
            @mousedown="startDrag"
            @mousemove="onDrag"
            @mouseup="endDrag"
            @mouseleave="endDrag"
            @touchstart="startDrag"
            @touchmove="onDrag"
            @touchend="endDrag"
        >
            <div class="w-10 h-1 bg-content-muted/30 rounded-full"></div>
        </div>

        {{-- Header --}}
        @if($title)
            <div class="flex items-center justify-between px-4 pb-3 border-b border-border shrink-0">
                <h3 class="text-base font-semibold text-content">{{ $title }}</h3>
                <div class="flex items-center gap-1 -mr-2">
                    {{-- Header actions slot --}}
                    @if(isset($headerActions))
                        {{ $headerActions }}
                    @endif
                    <button
                        type="button"
                        @click="open = false"
                        class="p-2 rounded-full text-content-muted hover:text-content hover:bg-surface-secondary transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Content --}}
        <div class="flex-1 min-h-0 overflow-y-auto overscroll-contain touch-pan-y">
            {{ $slot }}
        </div>

        {{-- Footer slot --}}
        @if(isset($footer))
            <div class="shrink-0 border-t border-border bg-surface">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
