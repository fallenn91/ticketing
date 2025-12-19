<x-ui.button :href="route('tickets.create')" {{ $attributes }}>
    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
    <span class="hidden sm:inline">Nuevo Ticket</span>
</x-ui.button>
