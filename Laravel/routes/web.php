<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\Livewire\Tickets\Details;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('tickets');
    })->name('dashboard');
    Route::get('/create', function() {
      return view('ticketCreate');
    })->name('create');
    Route::get('/management', function() {
      return view('ticketManagement');
    })->name('management');
    Route::get('/details/{ticket_number}',[ TicketController::class, 'show'])->name('details');
    Route::get('/configuration', function() {
      return view('ticketConfiguration');
    })->name('configuration');
});
