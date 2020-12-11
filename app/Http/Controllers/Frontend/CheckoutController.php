<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Cart;
use Session;
use Stripe;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCheckout(){
        return view('frontend.viewCheckout');
    }

    public function storeShippingInfo(Request $req){
        $validatedData = $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'division' => 'required',
            'district' => 'required',
            'upozila' => 'required',
            'zip' => 'required',
            'payment_method' => 'required',
            'shipping_method' => 'required',
        ]);

        if($req->payment_method=='hand_cash'){
            $shipping=array();
            $shipping['shipping_first_name']=$req->first_name;
            $shipping['shipping_last_name']=$req->last_name;
            $shipping['shipping_phone']=$req->phone;
            $shipping['shipping_email']=$req->email;
            $shipping['shipping_division']=$req->division;
            $shipping['shipping_district']=$req->district;
            $shipping['shipping_upozila']=$req->upozila;
            $shipping['shipping_zip_code']=$req->zip;

            $shipping_id=DB::table('shippings')->InsertGetId($shipping);
            if($shipping_id){
                $order=array();
                $order['order_track_id']=rand(1111,99999);
                $order['user_id']=Auth::user()->id;
                $order['shipping_id']=$shipping_id;
                $order['order_total']=str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', Cart::total());
                $order['order_qty']=Cart::count();
                $order['payment_method']=$req->payment_method;
                $order['order_ship_method']=$req->shipping_method;
                $order['order_ship_cost']=100;
                $order['order_cupon_cost']=str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', Cart::discount());
                $order['order_vat']=0.00;
                $order['order_day']=date('Y-m-d');
                $order['order_month']=date('Y-m');
                $order['order_year']=date('Y');
                $order_id=DB::table('orders')->InsertGetId($order);
                $track=DB::table('orders')->where('order_id',$order_id)->first();
                $track_id=$track->order_track_id;
                if($order_id){
                    $details=array();
                    foreach(Cart::content() as $row){
                        $details['order_id']=$order_id;
                        $details['product_id']=$row->id;
                        $details['product_name']=$row->name;
                        $details['product_size']=$row->options->size;
                        $details['product_color']=$row->options->color;
                        $details['product_image']=$row->options->image;
                        $details['product_qty']=$row->qty;
                        $details['product_price']=$row->price;
                        DB::table('order_products')->insert($details);
                    }
                    $notification=array(
                        'messege'=>'Hurrah!! Your order is completed.',
                        'alert-type'=>'success'
                    );

                    Cart::destroy();

                    return view('frontend.success',compact('track_id'))->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Oppsss!! Something Went Wrong.',
                        'alert-type'=>'error'
                         );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification=array(
                    'messege'=>'Oppsss!! Something Went Wrong.',
                    'alert-type'=>'error'
                     );

                return Redirect()->back()->with($notification);
            }

        }else if($req->payment_method=='stripe'){
            $shipping=array();
            $shipping['shipping_first_name']=$req->first_name;
            $shipping['shipping_last_name']=$req->last_name;
            $shipping['shipping_phone']=$req->phone;
            $shipping['shipping_email']=$req->email;
            $shipping['shipping_division']=$req->division;
            $shipping['shipping_district']=$req->district;
            $shipping['shipping_upozila']=$req->upozila;
            $shipping['shipping_zip_code']=$req->zip;
            $shipping['shipping_method']=$req->shipping_method;

            return view('frontend.stripe',compact('shipping'));
        }
    }

    public function stripe(){
        return view('frontend.stripe');
    }

    public function storeStripe(Request $req){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $result=Stripe\Charge::create ([
                "amount" => 1200.50 * 100,
                "currency" => "usd",
                "source" => $req->stripeToken,
                "metadata"=> ['order_id'=>rand(1111,99999)],
                "description" => "E-commerce"
        ]);

        if($result){
            $shipping=array();
            $shipping['shipping_first_name']=$req->first_name;
            $shipping['shipping_last_name']=$req->last_name;
            $shipping['shipping_phone']=$req->phone;
            $shipping['shipping_email']=$req->email;
            $shipping['shipping_division']=$req->division;
            $shipping['shipping_district']=$req->district;
            $shipping['shipping_upozila']=$req->upozila;
            $shipping['shipping_zip_code']=$req->zip;
            $shipping_id=DB::table('shippings')->InsertGetId($shipping);

            if($shipping_id){
                $order=array();
                $order['order_track_id']=$result->metadata->order_id;
                $order['user_id']=Auth::user()->id;
                $order['shipping_id']=$shipping_id;
                $order['order_total']=str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', Cart::total());
                $order['order_qty']=Cart::count();
                $order['payment_method']="Stripe";
                $order['transection_id']=$result->balance_transaction;
                $order['order_ship_method']=$req->shipping_method;
                $order['order_ship_cost']=100;
                $order['order_cupon_cost']=str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', Cart::discount());
                $order['order_vat']=0.00;
                $order['order_day']=date('Y-m-d');
                $order['order_month']=date('Y-m');
                $order['order_year']=date('Y');
                $order_id=DB::table('orders')->InsertGetId($order);
                $track=DB::table('orders')->where('order_id',$order_id)->first();
                $track_id=$track->order_track_id;
                if($order_id){
                    $details=array();
                    foreach(Cart::content() as $row){
                        $details['order_id']=$order_id;
                        $details['product_id']=$row->id;
                        $details['product_name']=$row->name;
                        $details['product_size']=$row->options->size;
                        $details['product_color']=$row->options->color;
                        $details['product_image']=$row->options->image;
                        $details['product_qty']=$row->qty;
                        $details['product_price']=$row->price;
                        DB::table('order_products')->insert($details);
                    }
                    $notification=array(
                        'messege'=>'Hurrah!! Your order is completed.',
                        'alert-type'=>'success'
                    );

                    Cart::destroy();

                    return view('frontend.success',compact('track_id'))->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Oppsss!! Something Went Wrong.',
                        'alert-type'=>'error'
                         );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification=array(
                    'messege'=>'Oppsss!! Something Went Wrong.',
                    'alert-type'=>'error'
                     );

                return Redirect()->back()->with($notification);
            }

        }
        // return $result;
        // dd($result);



        print_r($order);

        // Session::flash('success', 'Payment successful!');

        // return back();
    }


}
