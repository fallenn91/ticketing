<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Models\Ticket;

class Create extends Component
{
    public $title = '';
    public $content = '';

    public function create() 
    {
      Ticket::create(
        $this->only(['title', 'content'])
      );
      
    }
    public function render()
    {
        return view('livewire.tickets.create');
    }
}
