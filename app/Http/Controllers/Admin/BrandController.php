<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;
use Image;
class BrandController extends Controller
{

    public function viewBrands(){
        $brands=DB::table('brands')
                    ->get();
        return view('admin.viewBrands',compact('brands'));
    }

    // showBrandForm

    public function addBrand(){
        return view('admin.showBrandForm');
    }

    public function storeBrand(Request $req){
        $validatedData = $req->validate([
            'brand_name' => 'required|unique:brands',
            'brand_image' => 'required'
        ]);

        $data=array();
        $data['brand_name']=$req->brand_name;
        $data['brand_slug']=Str::slug($req->brand_name);
        $image=$req->file('brand_image');

        if($image){
            $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/brands/';
                $upload_path=$path.$name;
                $up=Image::make($image)
                        ->resize(150,150)
                        ->save($upload_path);
            $data['brand_image']=$upload_path;


            DB::table('brands')->insert($data);

            $notification=array(
                'messege'=>'Inserted SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }

    }

    public function editBrand($id){
        $brand=DB::table('brands')
                    ->where('brand_id',$id)
                    ->first();
        return view('admin.showBrandForm',compact('brand'));
    }


    public function updateBrand(Request $req,$id){
        $validatedData = $req->validate([
            'brand_name' => 'required',
        ]);

        $data=array();
        $data['brand_name']=$req->brand_name;
        $data['brand_slug']=Str::slug($req->brand_name);
        $image=$req->file('brand_image');

        if($image){
            $ext=$image->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
                $path='public/brands/';
                $upload_path=$path.$name;
                $up=Image::make($image)
                        ->resize(150,150)
                        ->save($upload_path);
            unlink($req->old_brand_image);
            $data['brand_image']=$upload_path;
            DB::table('brands')->where('brand_id',$id)->update($data);
            $notification=array(
                'messege'=>'Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('view.brand')->with($notification);
        }else{
            DB::table('brands')->where('brand_id',$id)->update($data);
            $notification=array(
                'messege'=>'Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('view.brand')->with($notification);
        }

    }

    public function deleteBrand($id){
        $brand=DB::table('brands')->where('brand_id',$id)->first();
        unlink($brand->brand_image);
        DB::table('brands')->where('brand_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.brand')->with($notification);
    }

    public function activeBrand($id){
        DB::table('brands')->where('brand_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.brand')->with($notification);
    }

    public function inActiveBrand($id){
        DB::table('brands')->where('brand_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Inactive SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.brand')->with($notification);
    }


}
