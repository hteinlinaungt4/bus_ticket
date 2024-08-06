<?php

use App\Models\Trip;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;

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
    $trip = Trip::with('tickets')->findOrFail(1);
    $bus = $trip->bus;
    $bookedSeats = $trip->tickets->pluck('seat_number')->toArray();

    return view('welcome', compact('trip', 'bus', 'bookedSeats'));
});

// Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
