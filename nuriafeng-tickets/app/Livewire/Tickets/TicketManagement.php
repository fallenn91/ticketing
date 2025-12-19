<?php

namespace App\Livewire\Tickets;

use App\Livewire\Traits\HasFilterableArrays;
use App\Models\Ticket;
use App\Services\TicketDataService;
use Livewire\Component;
use Livewire\WithPagination;

class TicketManagement extends Component
{
    use HasFilterableArrays;
    use WithPagination;

    public array $type = [];

    public array $category = [];

    public array $creator = [];

    public array $assignee = [];

    public array $deadline = [];

    private $categoriesCache = null;

    private $usersCache = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => []],
        'priority' => ['except' => []],
        'type' => ['except' => []],
        'category' => ['except' => []],
        'creator' => ['except' => []],
        'assignee' => ['except' => []],
        'deadline' => ['except' => []],
    ];

    protected function getFilterableFields(): array
    {
        return ['status', 'priority', 'type', 'category', 'creator', 'assignee', 'deadline'];
    }

    protected function getResettableFields(): array
    {
        return ['search', 'status', 'priority', 'type', 'category', 'creator', 'assignee', 'deadline'];
    }

    protected function getFilterLabels(): array
    {
        $ticketData = app(TicketDataService::class);
        $categories = $this->categoriesCache ?? $ticketData->getActiveCategories();
        $users = $this->usersCache ?? $ticketData->getOrderedUsers();

        return [
            'status' => Ticket::STATUSES,
            'priority' => Ticket::PRIORITIES,
            'type' => Ticket::TYPES,
            'category' => fn ($id) => $categories->firstWhere('id', $id)?->name ?? $id,
            'creator' => fn ($id) => $users->firstWhere('id', $id)?->name ?? $id,
            'assignee' => fn ($id) => $users->firstWhere('id', $id)?->name ?? $id,
            'deadline' => Ticket::DEADLINE_FILTERS,
        ];
    }

    public function updateTicketStatus(int $ticketId, string $status): void
    {
        $ticket = Ticket::findOrFail($ticketId);
        $this->authorize('update', $ticket);

        if (array_key_exists($status, Ticket::STATUSES)) {
            $ticket->update(['status' => $status]);
        }
    }

    public function updateTicketPriority(int $ticketId, string $priority): void
    {
        $ticket = Ticket::findOrFail($ticketId);
        $this->authorize('update', $ticket);

        if (array_key_exists($priority, Ticket::PRIORITIES)) {
            $ticket->update(['priority' => $priority]);
        }
    }

    public function render(TicketDataService $ticketData)
    {
        $this->categoriesCache = $ticketData->getActiveCategories();
        $this->usersCache = $ticketData->getOrderedUsers();

        $tickets = Ticket::query()
            ->search($this->search)
            ->applyFilters([
                'status' => $this->status,
                'priority' => $this->priority,
                'type' => $this->type,
                'category_id' => $this->category,
                'user_id' => $this->creator,
                'assigned_to_id' => $this->assignee,
            ])
            ->deadlineFilter($this->deadline)
            ->with(['category', 'creator', 'assignee'])
            ->orderByField($this->sortField, $this->sortDirection)
            ->paginate(15);

        $stats = $ticketData->getStatusStats();

        return view('livewire.tickets.ticket-list', array_merge(
            [
                'tickets' => $tickets,
                'categories' => $this->categoriesCache,
                'users' => $this->usersCache,
                'stats' => $stats,
                'deadlineOptions' => Ticket::DEADLINE_FILTERS,
                // NEW CONFIG PROPS:
                'title' => 'Todos los Tickets',
                'showStats' => true,
                'extraFilters' => ['type', 'category', 'creator', 'assignee'],
                'interactive' => true,
                'emptyMessage' => 'No hay tickets',
                'emptyAction' => false,
            ],
            $ticketData->getTicketFormData(),
        ));
    }
}
