<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Group;
use App\Livewire\Traits\FiltersTrait;
use App\Livewire\Traits\DropdownTrait;

class MyTickets extends Component
{
    use FiltersTrait, DropdownTrait, WithPagination;

    protected $paginationTheme = 'tailwind';

    public $openStatusDropdown1;
    public $openPriorityDropdown1;
    public $openStatusDropdown;
    public $openPriorityDropdown;

    public $users;

    

    public function mount()
    {
      $this->users = User::all();
      $this->mountFilters();
    }

    public function render()
    {
        $user = auth()->user();
        $groupsIds = $user->groups->pluck('id')->toArray();
      
        $query = Ticket::with(['assignedTo', 'status', 'priority', 'group'])
          ->where(function ($q) use ($user, $groupsIds) {
            $q->whereHas('assignedTo', fn($q2) => $q2->where('users.id', $user->id))
              ->orWhereHas('group', fn($q3) => $q3->whereIn('groups.id', $groupsIds));
          });

        $query = $this->applyFilters($query);

        $tickets = $query->paginate(5);

        $users = User::all();

        return view('livewire.my-tickets', compact('tickets', 'users'));
    }
    
}
