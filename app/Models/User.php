<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Override the default username field for authentication
    public function username()
    {
        return 'username';
    }

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Optional: Add a method to create admin user
    public static function createAdmin($name, $username, $password)
    {
        return self::create([
            'username' => $username,
            'password' => Hash::make($password),
        ]);
    }
}