<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myProfile(){
        return view('frontend.myAccount');
    }

    public function userInfo(){
        $user=Auth::user();

        return view('frontend.personalInfo',compact('user'));

    }

    public function orderInfo(){
        $id=Auth::user()->id;
        $orders=DB::table('orders')->where('user_id',$id)->orderBy('order_id','DESC')->paginate(5);
        return view('frontend.orderInfo',compact('orders'));
    }

    public function whislist(){
        $id=Auth::user()->id;

        $whislists=DB::table('whislists')
                    ->join('products','whislists.product_id','products.product_id')
                    ->where('user_id',$id)->paginate(10);
        return view('frontend.whislist',compact('whislists'));
    }

    public function myReview(){
        return view('frontend.review');
    }

    public function addWhislist($id){
        $result=DB::table('whislists')->where('product_id',$id)->first();
        if(empty($result)){
            $user_id=Auth::user()->id;
            $data=array();
            $data['user_id']=$user_id;
            $data['product_id']=$id;
            DB::table('whislists')->insert($data);
            return Response()->json(["success"=>"Whislist Added SuccessfullY"]);
        }else{
            return Response()->json(["error"=>"Oppss!! Allready Added."]);
        }

    }

    public function removeWhislist($id){
        DB::table('whislists')->where('whislist_id',$id)->delete();
        return Response()->json(["success"=>"Product Removed"]);

    }

    public function subscribe(Request $req){
        $count=DB::table('subscribers')->where('email',$req->email)->count();
        if($count>0){
            $notification=array(
                'messege'=>'Opps!! This Mail Already Exist.',
                'alert-type'=>'error'
                );

            return Redirect()->back()->with($notification);
        }else{
            $data=array();
            $data['user_id']=Auth::user()->id;
            $data['email']=$req->email;
            DB::table('subscribers')->insert($data);

            $notification=array(
                'messege'=>'Thanks For Subscribe!!',
                'alert-type'=>'success'
                );

            return Redirect()->back()->with($notification);
        }

    }

    public function unsubscribe(Request $req){
        $count=DB::table('subscribers')->where('email',$req->email)->count();
        if($count==0){
            $notification=array(
                'messege'=>'Opps!! This Mail Doesnt Exist.',
                'alert-type'=>'error'
                );

            return Redirect()->back()->with($notification);
        }else{
            DB::table('subscribers')->where('user_id',Auth::user()->id)->delete();

            $notification=array(
                'messege'=>'Thanks For Un-Subscribe!!',
                'alert-type'=>'success'
                );

            return Redirect()->back()->with($notification);
        }
    }



}
