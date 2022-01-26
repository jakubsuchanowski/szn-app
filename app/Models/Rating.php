<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function activities()
    {
        return $this->belongsTo(Activities::class,'activities_id');
    }

    public function kids()
    {
        return $this->belongsTo(Kids::class,'kids_id');
    }
    use HasFactory;
}
