<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=[
            'shipping_first_name','shipping_last_name','shipping_phone','shipping_email','shipping_district','shipping_upozila','shipping_zip_code'
    ];
}
