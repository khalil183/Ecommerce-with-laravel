<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class WhislistController extends Controller
{
    public function viewWhilist(){
        $whislists=DB::table('whislists')
                    ->join('products','whislists.product_id','products.product_id')
                    ->join('users','whislists.user_id','users.id')
                    ->select('whislists.*','users.name','products.product_name','products.product_code','products.product_images')
                    ->get();
        return view('admin.viewWhislist',compact('whislists'));
    }

    public function deleteWhislist($id){
        DB::table('whislists')->where('whislist_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('view.whislist')->with($notification);
    }

    public function activeWhislist($id){
        DB::table('whislists')->where('whislist_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.whislist')->with($notification);
    }

    public function inActiveWhislist($id){
        DB::table('whislists')->where('whislist_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.whislist')->with($notification);
     }
}
