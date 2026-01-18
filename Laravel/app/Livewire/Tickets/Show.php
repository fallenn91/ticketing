<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Show extends Component
{
    
    
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;
    public $statusFilter = null;
    public $showFilters = false;
    public $creationFilter = 'desc';
    public $statusPriority = null;
    public $showPriority = false;
    public $search = '';

    protected $listeners = ['saved', 
    'ticketUpdated' => 'refreshTicket', 
    'ticketAssigned' => 'refreshTicket'];

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
        $query->when(trim($this->search) !== '', function($query) {
          $userInput = trim($this->search);

          $query->where(function($q) use ($userInput) {
              $q->where('title', 'like', '%' . $userInput . '%')
              ->orWhere('ticket_number', 'like', '%' . $userInput . '%');
  
              if (preg_match('/TCK-(\d+)/', $userInput, $matches)) {
                  $q->orWhere('id', (int) $matches[1]);
  
              }            
          });
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
      $this->render();
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

    public function clearFilters()
    {
      $this->statusFilter = null;
      $this->statusPriority = null;
    }

    public function filterByCreation($value)
    {
      $this->creationFilter = $creationFilter;
    }

    
}
