<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\User;
use App\Models\Ticket;

class TicketSummary extends Component
{
    public $user;      
    public $statuses;  
    public $priorities;

    public function mount()
    {
        $this->user = Auth::user(); 

        $tickets = Ticket::where('assigned_to_id', auth()->id())->get();
        
        $this->user->load('assignedTo.status', 'assignedTo.priority');

        
        $this->statuses = TicketStatus::all();
        $this->priorities = TicketPriority::all();
    }

    public function render()
    {
        return view('livewire.tickets.ticket-summary');
    }

    
}
