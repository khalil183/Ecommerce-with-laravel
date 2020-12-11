<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'order_track_id','user_id','shipping_id','order_total','order_qty','payment_method','payment_status','transection_id','order_ship_method','order_ship_cost','order_cupon_cost','order_vat','order_day','order_month','order_year','order_status'
    ];
}
