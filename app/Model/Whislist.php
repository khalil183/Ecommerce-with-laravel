<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    protected $fillable=[
        'user_id','product_id','status'
    ];
}
