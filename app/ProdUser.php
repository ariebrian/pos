<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdUser extends Model
{
    //
    protected $table = 'product_store';
    protected $fillable = [
        'product_id', 'store_id', 'stock', 'satuan', 'active'
    ];
}
