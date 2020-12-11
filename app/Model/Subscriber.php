<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable=[
        'user_id','status','email'
    ];
}
