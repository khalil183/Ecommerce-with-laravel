<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'sub_category_name', 'sub_category_slug', 'status','category_id'
    ];

}
