<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    public function allOrder(){
        $orders=DB::table('orders')
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }
    public function viewOrder(){
        $orders=DB::table('orders')
                    ->where('order_status',0)
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }


    public function orderDetails($id){
        $order=DB::table('orders')
                ->join('users','orders.user_id','users.id')
                ->join('shippings','orders.shipping_id','shippings.shipping_id')
                ->where('orders.order_id',$id)
                ->first();
        $details=DB::table('order_products')->where('order_id',$id)->get();

       return view('admin.orderDetails',compact('order','details'));
    }

    public function orderPayment($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>1]);
        DB::table('orders')->where('order_id',$id)->update(['payment_status'=>1]);
        $notification=array(
            'messege'=>'Payment Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('new.orders')->with($notification);
    }

    public function payableOrder(){
        $orders=DB::table('orders')
                    ->where('order_status',1)
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }

    public function orderProgress($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>2]);
        $notification=array(
            'messege'=>'Progress Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('payable.order')->with($notification);
    }
    public function progressOrder(){
        $orders=DB::table('orders')
                    ->where('order_status',2)
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }

    public function orderDelivered($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>3]);
        $notification=array(
            'messege'=>'Delivered Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('progress.order')->with($notification);
    }

    public function deliveredOrder(){
        $orders=DB::table('orders')
                    ->where('order_status',3)
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }

    public function cancleOrder(){
        $orders=DB::table('orders')
                    ->where('order_status',4)
                    ->orderBy('order_id','DESC')->get();
        return view('admin.viewOrder',compact('orders'));
    }

    public function activeOrder($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>0]);
        $notification=array(
            'messege'=>'Actived Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('cancle.order')->with($notification);
    }

    public function orderCancle($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>4]);
        $notification=array(
            'messege'=>'Cancle Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('new.orders')->with($notification);
    }
}
