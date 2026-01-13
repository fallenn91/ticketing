<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowDetailsController;
use App\Models\Ticket;
use App\Livewire\Tickets\Details;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('tickets');
    })->name('dashboard');
    Route::get('/management', function() {
      return view('ticketManagement');
    })->name('management');
    Route::get('/details/{ticket_number}', function() {
      return view('ticketDetails');
    })->name('details');
});
