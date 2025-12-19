<?php

namespace App\Livewire\Tickets;

use App\Livewire\Traits\HasFilterableArrays;
use App\Models\Ticket;
use App\Services\TicketDataService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TicketList extends Component
{
    use HasFilterableArrays;
    use WithPagination;

    public ?int $category_id = null;

    public ?int $assigned_to_id = null;

    public array $deadline = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => []],
        'priority' => ['except' => []],
        'category_id' => ['except' => null],
        'assigned_to_id' => ['except' => null],
        'deadline' => ['except' => []],
    ];

    protected function getFilterableFields(): array
    {
        return ['status', 'priority', 'deadline'];
    }

    protected function getResettableFields(): array
    {
        return ['search', 'status', 'priority', 'category_id', 'assigned_to_id', 'deadline'];
    }

    protected function getFilterLabels(): array
    {
        return [
            'status' => Ticket::STATUSES,
            'priority' => Ticket::PRIORITIES,
            'deadline' => Ticket::DEADLINE_FILTERS,
        ];
    }

    public function render(TicketDataService $ticketData)
    {
        $baseQuery = Ticket::query()
            ->where(function ($query) {
                $query->where('user_id', Auth::id())
                    ->orWhere('assigned_to_id', Auth::id());
            });

        // Calculate status counts for the user's tickets (without filters)
        $statusCounts = (clone $baseQuery)
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $tickets = $baseQuery
            ->search($this->search)
            ->applyFilters([
                'status' => $this->status,
                'priority' => $this->priority,
                'category_id' => $this->category_id,
                'assigned_to_id' => $this->assigned_to_id,
            ])
            ->deadlineFilter($this->deadline)
            ->with(['category', 'assignee'])
            ->orderByField($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.tickets.ticket-list', array_merge(
            [
                'tickets' => $tickets,
                'deadlineOptions' => Ticket::DEADLINE_FILTERS,
                'statusCounts' => $statusCounts,
                // NEW CONFIG PROPS:
                'title' => 'Mis Tickets',
                'showStats' => false,
                'stats' => [],
                'extraFilters' => [],
                'interactive' => false,
                'emptyMessage' => 'No tienes tickets',
                'emptyAction' => true,
            ],
            $ticketData->getTicketFormData(includeUsers: true),
        ));
    }
}
