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
      // Filter
        if (auth()->user()->isAdmin()) {
          $tickets = Ticket::orderByDesc('created_at')->get();
        } else {
          $tickets = Ticket::where('user_id', auth()->id())
          ->orderByDesc('created_at')->get();
        }
        
        return view('livewire.tickets.show', compact('tickets'));
    }

    // METHODS
    public function delete(Ticket $tickets)
    {
        $this->authorize('delete', $tickets);
        $tickets->delete();
    }

    public function changePriority(Ticket $tickets)
    {
        $tickets->update(['priority' => $tickets->priority === 'low' ? 'medium' : ($tickets->priority === 'medium' ? 'high' : 'low')]);
    } 

    public function changeStatus(Ticket $tickets)
    {
        $tickets->update(['status' => $tickets->status === 'in_process' ? 'resolved' : ($tickets->status === 'resolved' ? 'closed' : 'in_process')]);
    }
    
}
