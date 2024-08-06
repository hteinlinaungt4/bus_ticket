<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_numbers' => 'required|string',
            'passenger_name' => 'required|string',
        ]);

        $seatNumbers = explode(',', $request->seat_numbers);

        foreach ($seatNumbers as $seatNumber) {
            $existingTicket = Ticket::where('trip_id', $request->trip_id)
                                    ->where('seat_number', $seatNumber)
                                    ->first();

            if ($existingTicket) {
                return redirect()->back()->with('error', "Seat $seatNumber is already booked.");
            }

            $ticket = new Ticket();
            $ticket->trip_id = $request->trip_id;
            $ticket->seat_number = $seatNumber;
            $ticket->passenger_name = $request->passenger_name;
            $ticket->save();
        }

        return redirect()->back()->with('success', 'Seats booked successfully!');
    }
}
