<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Show extends Component
{
    public $status;
    public $priority;
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;

    protected $listeners = ['saved', 'ticketUpdated' => 'refreshTickets'];

    public function render()
    {
      // Filter
        if (auth()->user()->isAdmin()) {
          $tickets = Ticket::orderByDesc('created_at')->get();
        } else {
          $tickets = Ticket::where('user_id', auth()->id())
          ->orWhere('assigned_to_id', auth()->id())
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
    
    public function toggleStatusDropdown($ticketId)
    {
      $this->openStatusDropdown = $this->openStatusDropdown === $ticketId ? null : $ticketId;
    }
    public function togglePriorityDropdown($ticketId)
    {
      $this->openPriorityDropdown = $this->openPriorityDropdown === $ticketId ? null : $ticketId;
    }

    public function changePriority($ticketId, $priority)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->priority = $priority;
        $ticket->save();
        $this->openPriorityDropdown = null;
        $this->dispatch('ticketUpdated', $ticketId); // Emit to all listeners
        
    } 

    public function changeStatus($ticketId, $status)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->status = $status;
        $ticket->save();
        $this->openStatusDropdown = null;
        $this->dispatch('ticketUpdated', $ticketId); // Emit to all listeners
        
    
    }

    public function refreshTicket($ticketId)
    {
      $ticket = Ticket::find($ticketId);
      if ($ticket) {

        $this->render();
      }
    }

    
}
