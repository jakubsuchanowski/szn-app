<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceActivities extends Model
{
    public function activities()
    {
        return $this->hasMany(Activities::class);
    }
    use HasFactory;
}
