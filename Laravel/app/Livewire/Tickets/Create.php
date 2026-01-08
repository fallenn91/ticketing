<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Models\Ticket;
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
    
    public function create()
    {
      $this->validate([
        'title' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
        'comment' => 'required|string|max:255',
        'category_id' => 'required|exists:tickets_category,id',
      ]);

      Ticket::create([
        'id' => $this->id,
        'title' => $this->title,
        'status' => $this->status ?? 'in_process',
        'priority' => $this->priority ?? 'medium',
        'created_ad' => now(),
        'user_id' => $this->user_id,
        'category_id' => $this->category_id,
        'assigned_to' => $this->assigned_to ?? null,
        'comment' => $this->comment,
      ])

      $this->dispath('saved');
      $this->comment = '';
      $this->user_id = null;
      $this->category_id = null;
    }
    public function render()
    {
        return view('livewire.tickets.create');
    }

    public function mount()
    {
      $this->users = User::where('role', 'user')->get();
      $this->tickets_category = TicketCategory::all();
    }

    public function saved()
    {
      $this->render();
    }

}
