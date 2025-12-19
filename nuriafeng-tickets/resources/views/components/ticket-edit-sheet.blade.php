{{-- Bottom sheet para editar título y descripción del ticket en mobile --}}
<x-ui.bottom-sheet name="ticket-edit" title="Editar ticket" maxHeight="90vh">
    <div class="p-4 space-y-4">
        <div>
            <label for="edit-title" class="block text-xs font-semibold uppercase tracking-wider text-content-muted mb-1.5">
                Título
            </label>
            <input
                id="edit-title"
                type="text"
                wire:model="title"
                class="w-full px-3 py-2 text-sm bg-surface-secondary border border-border rounded-lg
                       text-content placeholder:text-content-muted
                       focus:ring-2 focus:ring-accent/30 focus:border-accent focus:outline-none
                       transition-all"
                placeholder="Título del ticket..."
            />
            @error('title')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="edit-description" class="block text-xs font-semibold uppercase tracking-wider text-content-muted mb-1.5">
                Descripción
            </label>
            <textarea
                id="edit-description"
                wire:model="description"
                rows="6"
                class="w-full px-3 py-2 text-sm bg-surface-secondary border border-border rounded-lg
                       text-content placeholder:text-content-muted leading-relaxed
                       focus:ring-2 focus:ring-accent/30 focus:border-accent focus:outline-none
                       transition-all resize-none"
                placeholder="Describe el problema o solicitud..."
            ></textarea>
            @error('description')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex gap-3 p-4">
            <x-ui.button
                type="button"
                variant="secondary"
                class="flex-1"
                @click="$dispatch('close-ticket-edit-sheet'); $wire.cancelEditingAll()"
            >
                Cancelar
            </x-ui.button>
            <x-ui.button
                type="button"
                class="flex-1"
                @click="$wire.saveTicketFields().then(() => $dispatch('close-ticket-edit-sheet'))"
            >
                Guardar
            </x-ui.button>
        </div>
    </x-slot>
</x-ui.bottom-sheet>
