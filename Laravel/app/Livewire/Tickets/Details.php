<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Details extends Component
{
    public $ticket;
    public function mount($ticket)
    {
        $this->ticket = $ticket;
    }
    public function render()
    {
        return view('livewire.tickets.details');
    }
}
