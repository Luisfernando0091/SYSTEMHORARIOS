<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // ⚠️ Solo si usas Sanctum
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{   use HasRoles;
    use HasApiTokens, Notifiable; // ⚠️ si usas JWT, aquí va también el trait correspondiente
protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'lastname',
        'username',
        'email',
        'phone',
        'role',
        'password',
        'dni',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
