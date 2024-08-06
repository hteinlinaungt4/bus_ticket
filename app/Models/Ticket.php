<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    protected $fillable = ['trip_id', 'seat_number', 'passenger_name'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
