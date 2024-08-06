<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .seats {
            display: flex;
            flex-wrap: wrap;
            width: 300px;
        }
        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: green;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .seat.booked {
            background-color: red;
            cursor: not-allowed;
        }
        .seat.selected {
            background-color: yellow;
        }



        .seatsadmin {
            display: flex;
            flex-wrap: wrap;
            width: 300px;
        }
        .seatadmin {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: green;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .seatadmin.booked {
            background-color: red;
            cursor: not-allowed;
        }

    </style>
</head>
<body>

    <div class="container">
        {{-- <h1>Trip Details</h1>
        <h2>Route: {{ $trip->route }}</h2>
        <h3>Departure Time: {{ $trip->departure_time }}</h3> --}}

        <h4>Select Your Seats</h4>
        <div class="seats">
            @for($i = 1; $i <= 20; $i++)
                <div class="seat {{ in_array($i,$bookedSeats) ? 'booked' : '' }}"
                     data-seat="{{ $i }}">
                    {{ $i }}
                </div>
            @endfor
        </div>

        <form id="seatForm" method="POST" action="{{ route('tickets.store') }}">
            @csrf
            <input type="hidden" name="trip_id" value="1">
            <input type="hidden" name="seat_numbers" id="seatNumbers">
            <input type="hidden" name="passenger_name" value="John Doe"> <!-- Add a field for passenger name -->
            <button type="submit" class="btn btn-primary">Book Seats</button>
        </form>
    </div>

    <h1>Admin</h1>
    <div class="seatsadmin">
        @for($i = 1; $i <= 20; $i++)
            <div class="seatadmin {{ in_array($i,$bookedSeats) ? 'booked' : '' }}"
                >
                {{ $i }}
            </div>
        @endfor
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            const selectedSeats = new Set();

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    if (seat.classList.contains('booked')) {
                        return;
                    }

                    const seatNumber = seat.getAttribute('data-seat');

                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        selectedSeats.delete(seatNumber);
                    } else {
                        seat.classList.add('selected');
                        selectedSeats.add(seatNumber);
                    }

                    document.getElementById('seatNumbers').value = Array.from(selectedSeats).join(',');
                });
            });
        });
    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
