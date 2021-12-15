<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    public function kids()
    {
        return $this->belongsToMany(
            Kids::class,
            'kids_activities',
            'activities_id',
            'kid_id');
    }

    public function typeActivity()
    {
        return $this->belongsTo(TypeActivities::class, 'type_id');
    }
    public function placeActivity()
    {
        return $this->belongsTo(PlaceActivities::class, 'place_id');
    }
    use HasFactory;
}
