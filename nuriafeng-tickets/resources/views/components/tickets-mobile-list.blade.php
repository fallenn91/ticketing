@props(['tickets', 'fromAdmin' => false])

<div class="md:hidden space-y-3">
    @forelse($tickets as $ticket)
        <x-ticket-card :ticket="$ticket" :fromAdmin="$fromAdmin" />
    @empty
        <x-empty-state icon="ticket" title="No hay tickets" description="No se encontraron tickets">
            {{ $slot }}
        </x-empty-state>
    @endforelse
</div>
