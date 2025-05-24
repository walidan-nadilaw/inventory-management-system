<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'username', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = true;
}