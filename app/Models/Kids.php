<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Kids extends Authenticatable
{
    use Notifiable;
    protected $table = 'kids';
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
    use HasFactory;
}
