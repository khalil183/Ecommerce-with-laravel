<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable=[
        'cupon_name','cupon_offer','status'
    ];
}
