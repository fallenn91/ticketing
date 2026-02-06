<?php

namespace App\Livewire\Traits;

use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\TicketPriority;

trait FiltersTrait
{
    
    public $statuses;
    public $priorities;

    public $statusFilter = null;
    public $statusPriority = null;

    public $order = 'asc';
    public $orderBy = 'created_at';

    
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

        return $query->orderBy($this->orderBy, $this->order);
    }

    public function changeStatus($ticketId, $statusId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update(['status_id' => $statusId]);
        $this->openStatusDropdown1 = false;
        $this->openStatusDropdown = false;
    }
    public function changePriority($ticketId, $priorityId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update(['priority_id' => $priorityId]);
        $this->openPriorityDropdown1 = false;
        $this->openPriorityDropdown = false;
    }

    // Filtrar por estado
    public function filterBy($statusId, $priorityId)
    {
        $this->statusFilter = $statusId;
        $this->statusPriority = $priorityId;
        
        $this->resetPage(); // Livewire: resetea la paginación al aplicar filtro
    }

    public function clearFilters()
    {
      $this->statusFilter = null;
      $this->statusPriority = null;
    }

    
}
