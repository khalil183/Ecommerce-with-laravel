<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CuponController extends Controller
{
    public function viewCupon(){
        $cupons=DB::table('cupons')->get();
        return view('admin.viewCupon',compact('cupons'));
    }

    public function addCupon(){
        return view('admin.showCuponForm');
    }

    public function storeCupon(Request $req){
        $validatedData = $req->validate([
            'cupon_name' => 'required|unique:cupons',
            'cupon_offer' => 'required',
        ]);

        $data=array();
        $data['cupon_name']=$req->cupon_name;
        $data['cupon_offer']=$req->cupon_offer;
        DB::table('cupons')->insert($data);
        $notification=array(
            'messege'=>'Inserted Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function editCupon($id){
        $cupon=DB::table('cupons')->where('cupon_id',$id)->first();
        return view('admin.showCuponForm',compact('cupon'));

    }

    public function updateCupon(Request $req,$id){
        $validatedData = $req->validate([
            'cupon_name' => 'required',
            'cupon_offer' => 'required',
        ]);

        $data=array();
        $data['cupon_name']=$req->cupon_name;
        $data['cupon_offer']=$req->cupon_offer;
        DB::table('cupons')->where('cupon_id',$id)->update($data);
        $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.cupon')->with($notification);
    }

    public function deleteCupon($id){
        DB::table('cupons')->where('cupon_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('view.cupon')->with($notification);
    }

    public function activeCupon($id){
        DB::table('cupons')->where('cupon_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.cupon')->with($notification);
    }

    public function inActiveCupon($id){
        DB::table('cupons')->where('cupon_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'In-Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.cupon')->with($notification);
     }
}
