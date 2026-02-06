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
        $groupsIds = $user->groups->pluck('id')->toArray();
      
        $query = Ticket::with(['assignedTo', 'status', 'priority', 'groups'])
          ->where(function ($q) use ($user, $groupsIds) {
            $q->whereHas('assignedTo', fn($q2) => $q2->where('users.id', $user->id))
              ->orWhereHas('groups', fn($q3) => $q3->whereIn('groups.id', $groupsIds));
          });

        $query = $this->applyFilters($query);

        $tickets = $query->paginate(5);

        return view('livewire.my-tickets', compact('tickets'));
    }
}
