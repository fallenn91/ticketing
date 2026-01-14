<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketCategory;

class Create extends Component
{
    public $title;
    public $user_id;
    public $category;
    public $comment;
    public $users;
    public $category_id;
    public $tickets_category;
    public $assigned_to_id;
    public $description;
    public $ticket;
    public $ticket_number;
    
    
    public function mount()
    {
      // Select users and categories
      $this->users = User::all();
      $this->tickets_category = TicketCategory::all();
    }
    
    public function render()
    {
      return view('livewire.tickets.create');
    }
    public function create()
    {
      

      $this->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string|max:255',
        'category_id' => 'required|exists:tickets_category,id',
      ]);
      $nextNumber = (Ticket::max('ticket_number') ?? 0) + 1;

      $ticket = Ticket::create([
        'ticket_number' => $nextNumber,
        'user_id' => $this->user_id ?? auth()->id(),
        'assigned_to_id' => $this->assigned_to_id ?? null,
        'title' => $this->title,
        'description' => $this->description ?? '',
        'status' => 'in_process',
        'priority' => 'medium',
        'category_id' => $this->category_id,
        'created_at' => now(),
      ]);

      if (!empty($this->comment)) {
        $ticket->comments()->create([
          'user_id' => $this->user_id ?? auth()->id(),
          'comment' => $this->comment,
        ]);
      }
      
      $this->authorize('create', Ticket::class);
      $this->dispatch('saved');
      $this->title = '';
      $this->comment = '';
      $this->description = '';
      $this->user_id = null;
      $this->assigned_to_id = null;
      $this->category_id = null;

    }

    public function assignUser($userId)
    {
      $ticket = Ticket::find($this->ticketId);
      $ticket->assigned_to_id = $userId;
      $ticket->save();
      $this->assigned_to_id = $userId;
    }

}
