<?php

namespace App\Livewire\Tickets;
use App\Models\Ticket;
use App\Models\User;
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
    public $openStatusDropdown1 = null;
    public $openPriorityDropdown1 = null;
    public $statusFilter = null;
    public $showFilters = false;
    public $creationFilter = '';
    public $statusPriority = null;
    public $showPriority = false;
    public $search = '';
    public $myGroups;
    public $statuses;
    public $priorities;
    public $creationUser;
    public $users;
    

    protected $listeners = ['saved', 
    'ticketUpdated' => 'refreshTicket', 
    'ticketAssigned' => 'refreshTicket'];


    
    public function render()
    {
      
      $user = auth()->user();
      $query = Ticket::query();
      // Filter
      
      
      if (auth()->user()->isAdmin()) {
        $query = Ticket::query();
      } else {
        $groupIds = $user->groups()->pluck('groups.id')->toArray();

        $query = Ticket::where(function($q) use ($user, $groupIds) {
          $q->where('user_id', $user->id) 
          ->orWhere('assigned_to_id', $user->id)
          ->orWhereIn('group_id', $groupIds);
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

        /*****CREATED BY FILTER*****/

        $query->when($this->creationUser, fn($q) => $q->where('user_id', $this->creationUser));

        //$tickets = $query->orderBy('created_at', 'desc')->get();

        $tickets = $query->paginate(5);
        
        return view('livewire.tickets.show', compact('tickets'));
    }

    public function mount($showFilters = false, $showPriority = false)
    {

      $this->statuses = TicketStatus::all();
      $this->priorities = TicketPriority::all();
      $this->showFilters = $showFilters;
      $this->showPriority = $showPriority;
      $this->allUsers = User::class;
      $this->allGroups = Group::class;
      $this->users = User::all();

      $this->loadGroups();
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
    public function toggleStatusDropdown1($ticketId)
    {
      $this->openStatusDropdown1 = $this->openStatusDropdown1 === $ticketId ? null : $ticketId;
    }
    public function togglePriorityDropdown1($ticketId)
    {
      $this->openPriorityDropdown1 = $this->openPriorityDropdown1 === $ticketId ? null : $ticketId;
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
      $this->openStatusDropdown = false;
      $this->openStatusDropdown1 = false;

    }


    public function filterByPriority($priorityId)
    {
      $this->statusPriority = $priorityId;
      $this->openPriorityDropdown = false;
      $this->openPriorityDropdown1 = false;
    }

    public function clearFilters()
    {
      $this->statusFilter = null;
      $this->statusPriority = null;
      $this->search = '';
      $this->creationUser = '';
      $this->creationFilter = '';

      $this->resetPage();
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
