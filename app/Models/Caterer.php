<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Caterer extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'avatar',
        'address',
        'pobox',
        'zip',
        'city',
        'country',
        'phone',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
