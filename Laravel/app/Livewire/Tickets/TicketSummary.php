<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Group;

class TicketSummary extends Component
{
    public $user;      
    public $statuses;  
    public $priorities;
    public $myGroups;

    public function mount()
    {
        $this->user = Auth::user(); 
        $this->allGroups = Group::class;
        $this->loadGroups();
        $tickets = Ticket::where('assigned_to_id', auth()->id())
        ->with(['assignedTo', 'status', 'priority', 'groups'])->get();
        
        $this->user->load('assignedTo.status', 'assignedTo.priority');

        
        $this->statuses = TicketStatus::all();
        $this->priorities = TicketPriority::all();
        $this->groups = Group::all();
    }

    public function render()
    {
        
        return view('livewire.tickets.ticket-summary');
    }

    public function loadGroups()
    {
      $this->myGroups = Auth::user()->groups()->get();
    }

    
}
