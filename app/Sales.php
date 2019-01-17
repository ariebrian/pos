<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    protected $fillable=[
        'id_trans', 'product_id', 'store_id', 'qty', 'created_at',
    ];

    public function setUpdatedAt($value)
{
    return $this;
}
    
    public function products()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function stores()
    {
        return $this->belongsTo('App\Store','store_id');
    }
}
