<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=[
        'product_slug','slider_image','status','slider_thumbnail'
    ];
}
