<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserApi extends Authenticatable
{
    //

    use Notifiable;

    protected $table = 'stores';
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
