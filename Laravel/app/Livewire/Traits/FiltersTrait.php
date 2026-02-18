<?php

namespace App\Livewire\Traits;

use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\TicketPriority;

use App\Livewire\Traits\DropdownTrait;

trait FiltersTrait
{
    use DropdownTrait;

    public $statuses;
    public $priorities;

    public $statusFilter = null;
    public $statusPriority = null;

    public $order = 'desc';
    public $orderBy = 'created_at';

    public $userId = '';
    public $search = '';

    
    protected $queryString = ['statusFilter', 'order', 'orderBy', 'statusPriority'];

    public function mountFilters()
    {
        $this->statuses = TicketStatus::all();
        $this->priorities = TicketPriority::all();
    }
    
    // Aplicar filtros y orden a cualquier query de tickets
    public function applyFilters($query)
    {
      
        if ($this->statusFilter) {
          $query->where('status_id', $this->statusFilter);
        }
        if ($this->statusPriority) {
          $query->where('priority_id', $this->statusPriority);
        }
        if (!empty($this->userId)) {
          $query->where('user_id', $this->userId);
        }
        if (trim($this->search) !== '') {
            $userInput = strtolower(trim($this->search));
            $query->where(function($q) {
            $q->where('title', 'ilike', "%{$this->search}%")
              ->orWhere('ticket_number', 'ilike', "%{$this->search}%");
            });
        }

        return $query->orderBy('created_at', 'desc');
    }

    public function changeStatus($ticketId, $statusId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update(['status_id' => $statusId]);

        $this->closeStatusDropdowns($ticketId);
        
    }
    public function changePriority($ticketId, $priorityId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update(['priority_id' => $priorityId]);
        
        $this->closePriorityDropdowns($ticketId);
        
    }

    // Filtrar por estado
    public function filterBy($statusId, $priorityId)
    {
        $this->statusFilter = $statusId;
        $this->statusPriority = $priorityId;
        
        $this->openStatusDropdownGlobal = false;
        $this->openPriorityDropdownGlobal = false;
    }

    public function clearFilters()
    {
      $this->statusFilter = null;
      $this->statusPriority = null;
     // $this->userId = null;
    }

    

    
}
