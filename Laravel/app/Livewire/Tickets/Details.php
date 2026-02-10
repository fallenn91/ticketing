<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Group;
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
    public $groups;
    public $assignedToId = [];

    public $newComment = '';


    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->assigned_to_id = $ticket->assigned_to_id;
        $this->users = User::all();
        $this->statuses = TicketStatus::all();
        $this->tickets = Ticket::all();
        $this->groups = Group::all();
        
    }
    public function render()
    {
        $user = auth()->user();
        $groupsIds = $user->groups->pluck('id')->toArray();

        $tickets = Ticket::with(['creator', 'group'])->where(function($q) use ($user, $groupsIds) {
          $q->whereHas('group', fn($q2) => $q2->whereIn('groups.id', $groupsIds))
          ->orWhereHas('users', fn($q3) => $q3->where('users.id', $user->id));
          
        })->get();
        
        return view('livewire.tickets.details', compact('tickets'));
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
