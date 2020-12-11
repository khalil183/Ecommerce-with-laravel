<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;
class CategoryController extends Controller
{
    public function viewCategories(){
        $categories=DB::table('categories')->get();
        return view('admin.viewCategories',compact('categories'));
    }

    public function showAddCategoryForm(){
        return view('admin.showAddCategoryForm');
    }

    public function storeCategory(Request $req){

        $validatedData = $req->validate([
            'category_name' => 'required|unique:categories|max:100'
        ]);

        $data=array();
        $data['category_name']=$req->category_name;
        $data['category_slug']=Str::slug($req->category_name);
        DB::table('categories')->insert($data);

        $notification=array(
            'messege'=>'Category Created SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function editCategory($id){
        $category=DB::table('categories')->where('category_id',$id)->first();
        return view('admin.showAddCategoryForm',compact('category'));
    }

    public function updateCategory(Request $req,$id){

        $validatedData = $req->validate([
            'category_name' => 'required|unique:categories|max:100'
        ]);

        $data=array();
        $data['category_name']=$req->category_name;
        $data['category_slug']=Str::slug($req->category_name);
        DB::table('categories')->where('category_id',$id)->update($data);

        $notification=array(
            'messege'=>'Category Update SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.categories')->with($notification);
    }

    public function deleteCategory($id){
        DB::table('categories')->where('category_id',$id)->delete();
        $notification=array(
            'messege'=>'Category Deleted SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.categories')->with($notification);

    }

    public function activeCategory($id){
        DB::table('categories')->where('category_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Category Inactive SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.categories')->with($notification);
    }

    public function inActiveCategory($id){
        DB::table('categories')->where('category_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Category Inactive SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.categories')->with($notification);
    }


}
