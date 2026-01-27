<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\Livewire\Tickets\Details;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');

Route::get('/products/add', [ProductController::class, 'showAddProducts'])->name('products.add');

Route::post('/products/add', [ProductController::class, 'add']);

Route::get('/products/list', [ProductController::class, 'list'])->name('products.list');
Route::get('/products/list/{category}', [ProductController::class, 'categoryProduct'])->name('products.category');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/category/new', [CategoryController::class, 'add'])->name('category.new');

Route::post('/category/new', [CategoryController::class, 'addCategory']);

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/category/list', [CategoryController::class, 'showCategory'])->name('category.list');

Route::get('/category/{id}/products', [CategoryController::class, 'showProduct'])->name('category.product');


