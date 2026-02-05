<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Ticket;
use App\Livewire\Traits\FiltersTrait;
use App\Livewire\Traits\DropdownTrait;

class MyTickets extends Component
{
    use FiltersTrait, DropdownTrait;

    public $openStatusDropdown1 = null;
    public $openPriorityDropdown1 = null;
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;

    public function mount()
    {
      $this->mountFilters();
    }

    public function render()
    {
        $user = auth()->user();
      
        $query = Ticket::with(['assignedTo', 'status', 'priority', 'groups'])->whereHas('assignedTo', fn($q) => $q->where('users.id', $user->id));

        $query = $this->applyFilters($query);

        $tickets = $query->paginate(5);

        return view('livewire.my-tickets', compact('tickets'));
    }
}
