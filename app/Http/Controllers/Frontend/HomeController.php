<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    public function index(){
        $sliders=DB::table('sliders')->get();
        $products=DB::table('products')->where('status',1)->paginate(12);
        $buyone_getone=DB::table('products')->where('status',1)->where('buyone_getone',1)->paginate(12);

        $categories=DB::table('categories')->where('status',1)->get();
        $brands=DB::table('brands')->where('status',1)->get();
        return view('frontend.index',compact('sliders','products','brands','categories','buyone_getone'));
    }



    public function productDetails($slug){
        $product=$products=DB::table('products')
                            ->join('categories','products.product_category_id','categories.category_id')
                            ->join('brands','products.product_brand_id','brands.brand_id')
                            ->where('product_slug',$slug)->first();
        return view('frontend.productDetails',compact('product'));
    }

    public function modelProductDetails($id){
        $product=$products=DB::table('products')
                            ->where('product_id',$id)->first();
        return view('frontend.modelProductDetails',compact('product'));
    }

    public function productByCategory($slug){
        $category=DB::table('categories')->where('category_slug',$slug)->first();

        $products=DB::table('products')->where('product_category_id',$category->category_id)->where('status',1)->paginate(12);
        $categories=DB::table('categories')->where('status',1)->get();
        $brands=DB::table('brands')->where('status',1)->get();

        return view('frontend.productByCategory',compact('products','brands','categories'));
    }

    public function productBySubCategory($slug){
        $sub_category=DB::table('sub_categories')->where('sub_category_slug',$slug)->first();

        $products=DB::table('products')->where('product_sub_category_id',$sub_category->sub_category_id)->where('status',1)->paginate(12);
        $categories=DB::table('categories')->where('status',1)->get();
        $brands=DB::table('brands')->where('status',1)->get();
        return view('frontend.productByCategory',compact('products','brands','categories'));
    }

    public function productByBrand($slug){
        $brand=DB::table('brands')->where('brand_slug',$slug)->first();

        $products=DB::table('products')->where('product_brand_id',$brand->brand_id)->where('status',1)->paginate(12);
        $categories=DB::table('categories')->where('status',1)->get();
        $brands=DB::table('brands')->where('status',1)->get();
        return view('frontend.productByCategory',compact('products','brands','categories'));
    }

    public function ProductSearch(Request $req){
        $products=DB::table('products')->where('product_name',"LIKE","%".$req->search_name."%")->where('status',1)->paginate(12);
        $categories=DB::table('categories')->where('status',1)->get();
        $brands=DB::table('brands')->where('status',1)->get();
        return view('frontend.productByCategory',compact('products','brands','categories'));

    }

    public function orderTrack(Request $req){
        $count=DB::table('orders')->where('order_track_id',$req->order_id)->count();
        if($count>0){
            $order=DB::table('orders')
                    ->join('users','orders.user_id','users.id')
                    ->join('shippings','orders.shipping_id','shippings.shipping_id')
                    ->where('orders.order_track_id',$req->order_id)->first();
            $details=DB::table('order_products')->where('order_id',$order->order_id)->get();
            return view('frontend.orderTrack',compact('order','details'));
        }else{
            $notification=array(
                'messege'=>'OOppss!! Invalid Order Id',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }

    }


}
