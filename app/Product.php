<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'SKU', 'name', 'price', 'satuan',
    ];
    
    public function stores()
    {
        return $this->belongsToMany('App\Store')->withPivot('stock','satuan','active','created_at');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales');
    }
}
