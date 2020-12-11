<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'product_name','product_code','product_slug','product_images','product_brand_id','product_category_id','product_sub_category_id','buying_price','selling_price','qty','video_link','buyone_getone','size','color','weight','sort_des','long_des','offer_perchentage','offer_start_date','offer_end_date','status'
    ];
}



