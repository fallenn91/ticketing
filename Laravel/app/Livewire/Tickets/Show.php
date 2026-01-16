<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Show extends Component
{
    
    public $priority;
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;
    public $statusFilter = null;
    public $status = null;
    public $showFilters = false;
    public $creationFilter = 'desc';
    public $statusPriority = null;
    public $showPriority = false;
    public $search = '';

    protected $listeners = ['saved', 'ticketUpdated' => 'refreshTickets'];

    public function render()
    {
        $query = Ticket::query();
      // Filter
        if (auth()->user()->isAdmin()) {
          $query = Ticket::query();
        } else {
          $query = Ticket::where(function($q){
            $q->where('user_id', auth()->id())
          ->orWhere('assigned_to_id', auth()->id());
          });
        }

        /*****FILTERS STATUS AND PRIORITY*****/
        if (!is_null(($this->statusFilter))) {
          $query->where('status', $this->statusFilter);
        }
        if (!is_null(($this->statusPriority))) {
          $query->where('priority', $this->statusPriority);
        }

        /*****SEARCH*****/ 
        $userInput = strtoupper($this->search); 

        $query->where(function($q) use ($userInput) {
            $q->where('title', 'like', '%' . $userInput . '%');

            if (preg_match('/TCK-(\d+)/', $userInput, $matches) && is_numeric($matches[1])) {
                $q->orWhere('id', $matches[1]);
            }

            if (isset($this->search)) {
                $q->orWhere('ticket_number', 'like', '%' . $userInput . '%');
            }
        });

        /*****TIME CREATION FILTER*****/
        $query->orderBy(
          'created_at',
          in_array($this->creationFilter, ['asc', 'desc'])
          ? $this->creationFilter : 'desc'
        );


        $tickets = $query->get();
        
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
        
    } 

    public function changeStatus($ticketId, $status)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->status = $status;
        $ticket->save();
        $this->openStatusDropdown = null;
        
    
    }

    public function refreshTicket($ticketId)
    {
      $ticket = Ticket::find($ticketId);
      if ($ticket) {

        $this->render();
      }
    }

    public function filterByStatus($status)
    {
      $this->statusFilter = $status;

    }
    public function mount($showFilters = false, $showPriority = false)
    {
      $this->showFilters = $showFilters;
      $this->showPriority = $showPriority;
    }

    public function filterByPriority($priority)
    {
      $this->statusPriority = $priority;
    }

    public function filterByCreation($value)
    {
      $this->creationFilter = $creationFilter;
    }

    public function filterBySearching()
    {
      $this->validate([
        'search' => 'nullable|string|max:50',
      ]);
      //$this->search = $search;
    }
    
}
