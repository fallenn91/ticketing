<div
    x-data="{
        toasts: [],
        add(message, type = 'success') {
            const id = Date.now();
            this.toasts.push({ id, message, type, progress: 100 });
            setTimeout(() => this.remove(id), 5000);
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    @toast.window="add($event.detail.message, $event.detail.type)"
    class="fixed top-4 right-4 z-50 flex flex-col gap-3 pointer-events-none"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-8 scale-95"
            x-transition:enter-end="opacity-100 translate-x-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0 scale-100"
            x-transition:leave-end="opacity-0 translate-x-8 scale-95"
            class="pointer-events-auto flex flex-col rounded-xl shadow-elevated bg-surface border border-border dark:shadow-dark-elevated min-w-[280px] max-w-md overflow-hidden"
        >
            <div class="flex items-center gap-3 px-4 py-3">
            {{-- Icono success --}}
            <template x-if="toast.type === 'success'">
                <span class="shrink-0 w-5 h-5 text-emerald-500">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
            </template>

            {{-- Icono error --}}
            <template x-if="toast.type === 'error'">
                <span class="shrink-0 w-5 h-5 text-red-500">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </template>

            {{-- Icono warning --}}
            <template x-if="toast.type === 'warning'">
                <span class="shrink-0 w-5 h-5 text-amber-500">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </span>
            </template>

            {{-- Icono info --}}
            <template x-if="toast.type === 'info'">
                <span class="shrink-0 w-5 h-5 text-blue-500">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </template>

            <span x-text="toast.message" class="flex-1 text-sm font-medium text-content"></span>

            <button @click="remove(toast.id)" class="shrink-0 p-1 text-content-muted hover:text-content rounded transition-all duration-150 hover:bg-surface-secondary active:scale-95">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
            {{-- Barra de progreso --}}
            <div class="h-0.5 w-full bg-surface-secondary">
                <div class="h-full animate-progress-shrink"
                     :class="{
                         'bg-emerald-500': toast.type === 'success',
                         'bg-red-500': toast.type === 'error',
                         'bg-amber-500': toast.type === 'warning',
                         'bg-blue-500': toast.type === 'info'
                     }"></div>
            </div>
        </div>
    </template>
</div>
