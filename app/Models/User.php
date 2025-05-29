<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id'; // karena bukan 'id'

    protected $fillable = [
        'nama',
        'nim',
        'username_sso',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

}
