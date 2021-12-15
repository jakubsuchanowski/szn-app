<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    public function kids()
    {
        return $this->belongsToMany(
            Kids::class,
            'kids_trips',
            'trips_id',
            'kid_id');
    }
    use HasFactory;
}
