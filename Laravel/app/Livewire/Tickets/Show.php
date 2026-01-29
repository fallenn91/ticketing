<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'tailwind';
    public $openStatusDropdown = null;
    public $openPriorityDropdown = null;
    public $statusFilter = null;
    public $showFilters = false;
    public $creationFilter = 'desc';
    public $statusPriority = null;
    public $showPriority = false;
    public $search = '';
    public $myGroups;
    public $statuses;
    public $priorities;

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
        if ($this->statusFilter) {
          $query->where('status_id', $this->statusFilter);
        }

        if ($this->statusPriority) {
          $query->where('priority_id', $this->statusPriority);
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

        $tickets = $query->paginate(5);
        
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

    public function changePriority($ticketId, $priorityId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update([
          'priority_id' => $priorityId,
        ]);
        $ticket->save();
        $this->openPriorityDropdown = null;
        
    } 

    public function changeStatus($ticketId, $statusId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update([
          'status_id' => $statusId,
        ]);
        $ticket->save();
        $this->openStatusDropdown = null;
        
    
    }

    public function refreshTicket($ticketId)
    {
      $this->render();
    }

    public function filterByStatus($statusId)
    {
      $this->statusFilter = $statusId;

    }
    public function mount($showFilters = false, $showPriority = false)
    {

      $this->statuses = TicketStatus::all();
      $this->priorities = TicketPriority::all();
      $this->showFilters = $showFilters;
      $this->showPriority = $showPriority;
      $this->allUsers = User::class;
      $this->allGroups = Group::class;

      $this->loadGroups();
    }

    public function filterByPriority($priorityId)
    {
      $this->statusPriority = $priorityId;
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

    public function loadGroups()
    {
      $this->myGroups = Auth::user()->groups()->get();
      

    }

}
