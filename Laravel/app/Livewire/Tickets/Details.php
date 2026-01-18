<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\User;

class Details extends Component
{
    public $ticket;
    public $assigned_to_id;
    public $users;

    public $newComment = '';


    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->assigned_to_id = $ticket->assigned_to_id;
        $this->users = User::all();
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

    public function updatedAssignedToId($value)
    {
        $this->ticket->assigned_to_id = $value;
        $this->ticket->save();

        $this->emit('ticketAssigned', $this->ticket->id);
    }
}
