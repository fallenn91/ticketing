<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Details extends Component
{
    public Ticket $ticket;
    
    public function mount(Ticket $ticket)
    {
      $this->ticket = $ticket;
    }
    public function render()
    {
        return view('livewire.tickets.details');
    }
}
