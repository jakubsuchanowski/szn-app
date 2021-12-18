<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kids()
    {
        return $this->belongsTo(Kids::class, 'kid_id');
    }
    public function activities()
    {
        return $this->belongsTo(Activities::class,'activities_id');
    }
}
