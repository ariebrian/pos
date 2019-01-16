<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    protected $fillable=[
        'id_trans', 'product_id', 'store_id', 'qty', 'created_at',
    ];
}
