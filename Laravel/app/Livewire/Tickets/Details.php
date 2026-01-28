<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\TicketComment;
use App\Models\User;

class Details extends Component
{
    public $ticket;
    public $tickets;
    public $assigned_to_id;
    public $users;
    public $statuses;
    public $assignedToId = [];

    public $newComment = '';


    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->assigned_to_id = $ticket->assigned_to_id;
        $this->users = User::all();
        $this->statuses = TicketStatus::all();
        $this->tickets = Ticket::all();
    }
    public function render()
    {
        
        return view('livewire.tickets.details');
    }

    public function addComment($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        if(trim($this->newComment) === '') {
            return;
        }

        $ticket->comments()->create([
            'user_id' => $this->user_id ?? auth()->id(),
            'comment' => $this->newComment,
        ]);

        $this->newComment = '';
        $this->render();
    }

    public function assignedToIdUpdate($ticketId, $userId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->assigned_to_id = $userId;
        $ticket->save();

        //$this->emit('ticketAssigned', $ticket->id);
    }
}
