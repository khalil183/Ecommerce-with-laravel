<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable=[
        'order_id','product_id','product_name','product_size','product_color','product_qty','product_image','product_price'
    ];
}


