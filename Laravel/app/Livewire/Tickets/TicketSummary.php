<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\User;

class TicketSummary extends Component
{
    public $user;       // usuario logueado
    public $statuses;   // todos los estados de tickets
    public $priorities; // todas las prioridades

    public function mount()
    {
        $this->user = Auth::user(); // usuario logueado

        // Traer los tickets del usuario logueado con relaciones
        $this->user->load('assignedTo.status', 'assignedTo.priority');

        // Traer todos los status y prioridades para mostrar
        $this->statuses = TicketStatus::all();
        $this->priorities = TicketPriority::all();
    }

    public function render()
    {
        return view('livewire.tickets.ticket-summary');
    }
}
