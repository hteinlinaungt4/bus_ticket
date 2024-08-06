<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'total_seats'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
