<?php

namespace App\Livewire\Tickets;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Ticket;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved'];
    use AuthorizesRequests;

    public function render()
    {
        if (auth()->user()->isAdmin()) {
          $tickets = Ticket::orderByDesc('created_at')->get();
        } else {
          $tickets = Ticket::where('user_id', auth()->id())
          ->orderByDesc('created_at')->get();
        }
        return view('livewire.tickets.show', compact('tickets'));
    }
}
