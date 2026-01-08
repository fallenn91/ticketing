<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Models\Ticket;
use App\Models\User;
use App\Models\TicketCategory;

class Create extends Component
{
    public $title = '';
    public $user_id = '';
    public $category = '';
    public $comment = '';
    public $users = [];
    public $category_id = '';
    public $tickets_category = [];
    
    public function create()
    {
      $this->validate([
        'title' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
        'category' => 'required|string|max:255',
      ]);
    }
    public function render()
    {
        return view('livewire.tickets.create');
    }

    public function mount()
    {
      $this->users = User::where('role', 'user')->get();
    }

    public function saved()
    {
      $this->render();
    }

}
