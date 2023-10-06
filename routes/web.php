<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::get('/dashboard/ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');
    Route::post('/dashboard/ticket', [TicketController::class, 'post'])->name('ticket.post');
    Route::get('/dashboard/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::patch('/dashboard/ticket', [TicketController::class, 'update'])->name('ticket.update');
    Route::delete('/dashboard/ticket', [TicketController::class, 'destroy'])->name('ticket.destroy');

    Route::get('/json/ticket', [TicketController::class, 'indexJson'])->name('indexJson');
});

require __DIR__.'/auth.php';
