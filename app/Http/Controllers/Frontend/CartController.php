<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use DB;
class CartController extends Controller
{
    public function viewCart(){
        $content=Cart::content();
        return view('frontend.cart',compact('content'));
    }

    public function addToCart(Request $req){
        $content=Cart::content();
        $added=false;
        foreach($content as $row){
            if($row->id==$req->id){
                $added=true;
            }
        }
        if($added==false){
            $data=array();
            $data['id']=$req->id;
            $data['name']=$req->name;
            if($req->qty<=0){
                $data['qty']=1;
            }else{
                $data['qty']=$req->qty;
            }
            $data['price']=$req->price;
            if($req->weight != null){
                $data['weight']=$req->weight;
            }else{
                $data['weight']=1;
            }
            $data['options']['image']=$req->image;
            if($req->color != null){
                $data['options']['color']=$req->color;
            }
            if($req->size != null){
                $data['options']['size']=$req->size;
            }

            Cart::add($data);
            $notification=array(
                'messege'=>'Product Added SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Opps!!! Allready Added.',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }
    }

    public function updateCart(Request $req,$id){
        Cart::update($id,$req->qty);
        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }

    public function deleteItem($id){
        Cart::remove($id);
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function applyCupon(Request $req){
        $cupon=DB::table('cupons')->where('cupon_name',$req->cupon)->where('status',1)->first();
        if(empty($cupon)){
            $notification=array(
                'messege'=>'Cupon InValid',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }else{
            Cart::setGlobalDiscount($cupon->cupon_offer);
            $notification=array(
                'messege'=>'Cupon Applied SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);

        }

    }


    public function addToCartByAjax(Request $req){
        $content=Cart::content();
        $added=false;
        foreach($content as $row){
            if($row->id==$req->id){
                $added=true;
            }
        }
        if($added==false){
            $data=array();
            $data['id']=$req->id;
            $data['name']=$req->name;
            if($req->qty<=0){
                $data['qty']=1;
            }else{
                $data['qty']=$req->qty;
            }
            $data['price']=$req->price;
            if($req->weight != null){
                $data['weight']=$req->weight;
            }else{
                $data['weight']=1;
            }
            $data['options']['image']=$req->image;
            if($req->color != null){
                $data['options']['color']=$req->color;
            }
            if($req->size != null){
                $data['options']['size']=$req->size;
            }

            Cart::add($data);
            return Response()->json(["success"=>"Product Added SuccessfullY","qty"=>$data['qty']]);
        }else{
            return Response()->json(["error"=>"Opps!!! Allready Added."]);
        }
    }
}
