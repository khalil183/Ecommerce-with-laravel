<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
class SliderController extends Controller
{
    public function viewSlider(){
        $sliders=DB::table('sliders')
                    ->join('products','sliders.product_slug','products.product_slug')
                    ->select('sliders.*','products.product_name','products.product_code')
                    ->get();
        return view('admin.viewSlider',compact('sliders'));
    }

    public function addSlider(){
        $products=DB::table('products')->get();
        return view('admin.showSliderForm',compact('products'));
    }

    public function storeSlider(Request $req){

        $validatedData = $req->validate([
            'product_slug' => 'required|unique:sliders',
            'slider_thumbnail' => 'required',
            'slider_image' => 'required'
        ]);

        $data=array();
        $data['product_slug']=$req->product_slug;
        $data['slider_thumbnail']=$req->slider_thumbnail;
        $image=$req->file('slider_image');

        if($image){
            $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/sliders/';
                $upload_path=$path.$name;
                $up=Image::make($image)
                        ->resize(1920,1001)
                        ->save($upload_path);
            $data['slider_image']=$upload_path;


            DB::table('sliders')->insert($data);

            $notification=array(
                'messege'=>'Inserted SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('view.slider')->with($notification);
        }
    }

    public function editSlider($id){
        $slider=DB::table('sliders')
                    ->join('products','sliders.product_slug','products.product_slug')
                    ->where('sliders.slider_id',$id)->first();
        return view('admin.showSliderForm',compact('slider'));
    }

    public function updateSlider(Request $req,$id){
        $validatedData = $req->validate([
            'slider_thumbnail' => 'required',
        ]);

        $data=array();
        $data['slider_thumbnail']=$req->slider_thumbnail;
        $image=$req->file('slider_image');

        if($image){
            $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/sliders/';
                $upload_path=$path.$name;
                $up=Image::make($image)
                        ->resize(1920,1001)
                        ->save($upload_path);
                unlink($req->slider_old_image);

            $data['slider_image']=$upload_path;
            DB::table('sliders')->where('slider_id',$id)->update($data);
            $notification=array(
                'messege'=>'Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('view.slider')->with($notification);
        }else{
            $data=array();
            $data['slider_thumbnail']=$req->slider_thumbnail;
            DB::table('sliders')->where('slider_id',$id)->update($data);

            $notification=array(
                'messege'=>'Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('view.slider')->with($notification);
        }
    }

    public function deleteSlider($id){
        $slider_info=DB::table('sliders')->where('slider_id',$id)->first();
        DB::table('sliders')->where('slider_id',$id)->delete();
        unlink($slider_info->slider_image);
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.slider')->with($notification);

    }

    public function activeSlider($id){
        DB::table('sliders')->where('slider_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.slider')->with($notification);
    }

    public function inActiveSlider($id){

        DB::table('sliders')->where('slider_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'InActive SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.slider')->with($notification);
     }
}
