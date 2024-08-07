<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // If your table name is different from 'admins'
    protected $table = 'admins';

    // Define the fillable properties
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hidden properties when serializing the model
    protected $hidden = [
        'password', 'remember_token',
    ];
}
