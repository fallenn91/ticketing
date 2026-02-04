<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\TicketComment;
use App\Models\TicketCategory;
use App\Models\Group;

class AdminTickets extends Component
{
    public function render()
    {
      $admin = Auth::user();
      
      $tickets = Ticket::with(['assignedTo', 'status', 'priority', 'groups'])->whereHas('assignedTo', fn($q) => $q->where('users.id', $admin->id))->get();

      return view('livewire.admin-tickets', compact('tickets'));

    }

}

