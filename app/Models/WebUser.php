<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class WebUser extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'webusers';               // Table name
    protected $fillable = ['email', 'password']; // Fields that can be mass-assigned
    protected $hidden = ['password'];            // Hide password in JSON responses
}