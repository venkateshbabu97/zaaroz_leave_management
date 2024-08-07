<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    // If your table name is different from 'employees'
    protected $table = 'employees';

    // Define the fillable properties
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hidden properties when serializing the model
    protected $hidden = [
        'password', 'remember_token',
    ];
}
