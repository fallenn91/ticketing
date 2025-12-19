<?php

use App\Http\Controllers\AttachmentController;
use App\Livewire\Tickets\TicketCreate;
use App\Livewire\Tickets\TicketList;
use App\Livewire\Tickets\TicketManagement;
use App\Livewire\Tickets\TicketShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

/*

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
});
*/
