<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class History extends Component
{
  public $ticket; 

    public function mount()
    {
      $ticket = Ticket::all();
    }
    public function render()
    {
        return view('livewire.tickets.history');
    }
}
