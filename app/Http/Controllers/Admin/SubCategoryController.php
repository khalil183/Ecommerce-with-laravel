<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;
class SubCategoryController extends Controller
{
    public function viewSubCategories(){
        $subCategories=DB::table('sub_categories')
                        ->join('categories','sub_categories.category_id','categories.category_id')
                        ->select('sub_categories.*','categories.category_name')
                        ->get();
        return view('admin.viewSubCategories',compact('subCategories'));
    }

    public function showAddSubCategoryForm(){
        $categories=DB::table('categories')
                        ->get();
        return view('admin.showSubCategoryForm',compact('categories'));
    }

    public function storeSubCategory(Request $req){

        $validatedData = $req->validate([
            'sub_category_name' => 'required|unique:sub_categories|max:100',
            'category_id' => 'required'
        ]);

        $data=array();
        $data['sub_category_name']=$req->sub_category_name;
        $data['category_id']=$req->category_id;
        $data['sub_category_slug']=Str::slug($req->sub_category_name);
        DB::table('sub_categories')->insert($data);

        $notification=array(
            'messege'=>'Inserted SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function editSubCategory($id){
        $subCategory=DB::table('sub_categories')->where('sub_category_id',$id)->first();
        $categories=DB::table('categories')
                        ->get();
        return view('admin.showSubCategoryForm',compact('subCategory','categories'));
    }

    public function updateSubCategory(Request $req,$id){

        $validatedData = $req->validate([
            'sub_category_name' => 'required|unique:sub_categories|max:100',
            'category_id' => 'required'
        ]);

        $data=array();
        $data['sub_category_name']=$req->sub_category_name;
        $data['category_id']=$req->category_id;
        $data['sub_category_slug']=Str::slug($req->sub_category_name);
        DB::table('sub_categories')->where('sub_category_id',$id)->update($data);

        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.sub.categories')->with($notification);
    }

    public function deleteSubCategory($id){
        DB::table('sub_categories')->where('sub_category_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.sub.categories')->with($notification);

    }

    public function activeSubCategory($id){
        DB::table('sub_categories')->where('sub_category_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.sub.categories')->with($notification);
    }

    public function inActiveSubCategory($id){
        DB::table('sub_categories')->where('sub_category_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'InActive SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.sub.categories')->with($notification);
     }
}
