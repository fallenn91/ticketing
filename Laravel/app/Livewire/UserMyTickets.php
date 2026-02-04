<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;


class UserMyTickets extends Component
{
    public function render()
    {
        $user = auth()->user();
      
        $tickets = Ticket::with(['assignedTo', 'status', 'priority', 'groups'])->whereHas('assignedTo', fn($q) => $q->where('users.id', $user->id))->get();
        return view('livewire.user-my-tickets', compact('tickets'));
    }

}
