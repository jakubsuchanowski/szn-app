<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Kids extends Authenticatable
{
    use Notifiable;
//    protected $table = 'kids';
    protected  $fillable = [
        'surname',
        'name',
        'email',
        'password',
        'user_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->belongsToMany(
            Activities::class,
            'kids_activities',
            'kid_id',
            'activities_id');
    }

    public function trips()
    {
        return $this->belongsToMany(
            Trips::class,
            'kids_trips',
            'kid_id',
            'trips_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
    use HasFactory;
}
