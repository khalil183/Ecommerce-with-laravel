<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OfferController extends Controller
{
    public function viewOffers(){
        $products=DB::table('products')->where('offer_perchentage','!=',null)->get();
        return view('admin.viewOffers',compact('products'));
    }

    public function specificProductOffer(){
        $products=DB::table('products')->get();
        return view('admin.SpecificProductOffer',compact('products'));
    }

    public function storeSpecificProductOffer(Request $req){
        $validatedData = $req->validate([
            'product_name' => 'required',
            'offer_perchentage' => 'required',
            'offer_start_date' => 'required',
            'offer_end_date' => 'required',
        ]);

        $data=array();

        $data['offer_perchentage']=$req->offer_perchentage;
        $data['offer_start_date']=$req->offer_start_date;
        $data['offer_end_date']=$req->offer_end_date;

        DB::table('products')->where('product_id',$req->product_name)->update($data);

        $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.offers')->with($notification);
    }

    public function editSpecificProductOffer($id){
        $product=DB::table('products')->where('product_id',$id)->first();
        $products=DB::table('products')->get();
        return view('admin.SpecificProductOffer',compact('product','products'));
    }

    public function updateSpecificProductOffer(Request $req,$id){
        $validatedData = $req->validate([
            'offer_perchentage' => 'required',
            'offer_start_date' => 'required',
            'offer_end_date' => 'required',
        ]);

        $data=array();
        $data['offer_perchentage']=$req->offer_perchentage;
        $data['offer_start_date']=$req->offer_start_date;
        $data['offer_end_date']=$req->offer_end_date;

        DB::table('products')->where('product_id',$id)->update($data);

        $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.offers')->with($notification);
    }

    public function getSpecificProductOffer($id){
        $data=array();
        $data['offer_perchentage']=null;
        $data['offer_start_date']=null;
        $data['offer_end_date']=null;

        DB::table('products')->where('product_id',$id)->update($data);

        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.offers')->with($notification);
    }

    public function allProductOffer(){
        return view('admin.allProductOffer');
    }

    public function storeAllProductOffer(Request $req){
        $validatedData = $req->validate([
            'offer_perchentage' => 'required',
            'offer_start_date' => 'required',
            'offer_end_date' => 'required',
        ]);

        $data=array();
        $data['offer_perchentage']=$req->offer_perchentage;
        $data['offer_start_date']=$req->offer_start_date;
        $data['offer_end_date']=$req->offer_end_date;

        $products=DB::table('products')->get();
        foreach($products as $row){
            DB::table('products')->where('product_id',$row->product_id)->update($data);
        }
        $notification=array(
            'messege'=>'Inserted Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.offers')->with($notification);
    }
}
