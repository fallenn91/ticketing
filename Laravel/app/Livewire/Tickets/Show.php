<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Show extends Component
{
    public $status;
    public $priority;
    
    protected $listeners = ['saved', 'ticketUpdated' => 'refreshTickets'];

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
    public function deleteTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        Gate::authorize('delete', $ticket);
        $ticket->delete();
        session()->flash('message', 'Ticket deleted successfully.');
    }
    

    public function changePriority($ticketId, $priority)
    {
        Ticket::findOrFail($ticketId)->update(['priority' => $priority]);
        //$this->dispatch('ticketUpdated', $ticketId); // Emit to all listeners
        $this->dispatchBrowserEvent('ticket-updated', [
        'ticketId' => $ticket->id,
        'priority' => $ticket->priority,
    ]);
    } 

    public function changeStatus($ticketId, $status)
    {
         Ticket::findOrFail($ticketId)->update(['status' => $status]);
         //$this->dispatch('ticketUpdated', $ticketId); // Emit to all listeners
         $this->dispatchBrowserEvent('ticket-updated', [
        'ticketId' => $ticket->id,
        'status' => $ticket->status,
    ]);
    }

    public function refreshTicket($ticketId)
    {
      $ticket = Ticket::find($ticketId);
      if ($ticket) {

        $this->render();
      }
    }
    
}
