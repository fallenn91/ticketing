<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Group;
use App\Models\TicketPriority;
use App\Livewire\Traits\FiltersTrait;
use App\Livewire\Traits\DropdownTrait;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    use WithPagination, FiltersTrait, DropdownTrait;

    protected $paginationTheme = 'tailwind';
    
    public $myGroups;
    public $users;

    public function mount()
    {
        $this->mountFilters();
        $this->users = User::all();
        $this->allGroups = Group::class;

    }

    public function render()
    {
        $user = auth()->user();
        $query = Ticket::query();
        // Aplicar filtros del Trait
        if (!empty($this->userId)) {
            $query->where('user_id', $this->userId);
        }
        $query = $this->applyFilters($query);

        // Ejemplo de permisos
        if (!auth()->user()->isAdmin()) {
            $groupIds = $user->groups()->pluck('groups.id')->toArray();
            $query->where(function($q) use ($user, $groupIds) {
                $q->where('user_id', $user->id)
                  ->orWhere('assigned_to_id', $user->id)
                  ->orWhereIn('group_id', $groupIds);
            });
        }

        $tickets = $this->applyFilters(Ticket::query())->paginate(5);

        return view('livewire.tickets.show', compact('tickets'));
    }

    public function deleteTicket($ticketId)
    {
      $ticket = Ticket::findOrFail($ticketId);
      $ticket->delete($ticketId);
      $ticket = Ticket::all();

    }
}
