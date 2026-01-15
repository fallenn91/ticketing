<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function show($ticket_number)
    {
        $ticket = Ticket::where('ticket_number', $ticket_number)->firstOrFail(); // fetch the ticket by id
        return view('ticketDetails', compact('ticket')); // pass it to the Blade
    }
    
}
