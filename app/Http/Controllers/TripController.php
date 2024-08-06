<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // public function show($id)
    // {
    //     $trip = Trip::with('tickets')->findOrFail($id);
    //     $bus = $trip->bus;
    //     $bookedSeats = $trip->tickets->pluck('seat_number')->toArray();

    //     return view('trips.show', compact('trip', 'bus', 'bookedSeats'));
    // }
}
