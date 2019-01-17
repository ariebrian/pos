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

    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('stock','satuan','active','created_at');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales');
    }

}
