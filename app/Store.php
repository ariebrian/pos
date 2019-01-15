<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
