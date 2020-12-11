<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;
use Image;
class ProductController extends Controller
{
    public function viewProducts(){
        $products=DB::table('products')
                    ->join('categories','products.product_category_id','categories.category_id')
                    // ->join('sub_categories','products.product_sub_category_id','sub_categories.sub_category_id')
                    ->join('brands','products.product_brand_id','brands.brand_id')
                    ->select('products.*','brands.brand_name','categories.category_name')
                    ->get();
        return view('admin.viewProducts',compact('products'));
    }

    public function addProduct(){
        $categories=DB::table('categories')->get();
        $brands=DB::table('brands')->get();
        return view('admin.showProductForm',compact('categories','brands'));
    }

    public function searchSubCategory(Request $req){
        $subCat=DB::table('sub_categories')->where('category_id',$req->cat_id)->get();
        if(count($subCat)==0){
            echo "<option value=''>Select Sub Category</option>";
        }else{
            foreach($subCat as $row){
                echo "<option value='$row->sub_category_id'>$row->sub_category_name</option>";
            }
        }
    }

    public function storeProduct(Request $req){

        $validatedData = $req->validate([
            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products',
            'cat_id' => 'required',
            'product_brand_id' => 'required',
            'qty' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'sort_des' => 'required',
        ]);


       $images=$req->file('product_images');
       if(count($images)==3){
            $data=array();
            $data['product_name']=$req->product_name;
            $data['product_slug']=Str::slug($req->product_name).'-'.$req->product_code;
            $data['product_code']=$req->product_code;
            $data['product_category_id']=$req->cat_id;
            $data['product_sub_category_id']=$req->sub_cat;
            $data['product_brand_id']=$req->product_brand_id;
            $data['qty']=$req->qty;
            $data['buying_price']=$req->buying_price;
            $data['selling_price']=$req->selling_price;
            $data['size']=$req->size;
            $data['color']=$req->color;
            $data['weight']=$req->weight;
            $data['video_link']=$req->video_link;
            $data['sort_des']=$req->sort_des;
            $data['long_des']=$req->long_des;
            $data['status']=$req->status;
            $data['buyone_getone']=$req->buyone_getone;
            if($images){
                $photo=array();
                $i=0;
                foreach($req->product_images as $row){
                    $ext=$row->getClientOriginalExtension();
                    $name= date('Y-m-d-h-i-s-').rand(999,9999).$i.'.'.$ext;
                    $path='public/products/';
                    $upload_path=$path.$name;
                    Image::make($row)
                            ->resize(370,350)
                            ->save($upload_path);

                    $photo[]=$upload_path;
                    $i++;
                }
                $data['product_images']=json_encode($photo);

               DB::table('products')->insert($data);
               $notification=array(
                'messege'=>'Inserted Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
        }
       }else{
        $notification=array(
            'messege'=>'Oppss!! 3 Images Must Be Uploaded',
            'alert-type'=>'error'
             );
         return Redirect()->back()->with($notification);
       }


    }

    public function editProduct($id){
        $categories=DB::table('categories')->get();
        $sub_categories=DB::table('sub_categories')->get();
        $brands=DB::table('brands')->get();
        $product=DB::table('products')->where('product_id',$id)->first();
        return view('admin.editProduct',compact('product','categories','sub_categories','brands'));

    }

    public function updateProduct(Request $req,$id){

        $validatedData = $req->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'cat_id' => 'required',
            'product_brand_id' => 'required',
            'qty' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'sort_des' => 'required',
        ]);

        $data=array();
        $data['product_name']=$req->product_name;
        $data['product_slug']=Str::slug($req->product_name).'-'.$req->product_code;
        $data['product_code']=$req->product_code;
        $data['product_category_id']=$req->cat_id;
        $data['product_sub_category_id']=$req->sub_cat;
        $data['product_brand_id']=$req->product_brand_id;
        $data['qty']=$req->qty;
        $data['buying_price']=$req->buying_price;
        $data['selling_price']=$req->selling_price;
        $data['size']=$req->size;
        $data['color']=$req->color;
        $data['weight']=$req->weight;
        $data['video_link']=$req->video_link;
        $data['sort_des']=$req->sort_des;
        $data['long_des']=$req->long_des;
        $data['status']=$req->status;
        $data['buyone_getone']=$req->buyone_getone;


       $images=$req->file('product_images');
       if($images){
        if(count($images)==3){
            $photo=array();
            $i=0;
            foreach($req->product_images as $row){
                $ext=$row->getClientOriginalExtension();
                $name= date('Y-m-d-h-i-s-').rand(999,9999).$i.'.'.$ext;
                $path='public/products/';
                $upload_path=$path.$name;
                Image::make($row)
                        ->resize(370,350)
                        ->save($upload_path);

                $photo[]=$upload_path;
                $i++;
            }
            $data['product_images']=json_encode($photo);

            foreach(json_decode($req->product_old_images) as $old){
                unlink($old);
            }

           DB::table('products')->where('product_id',$id)->update($data);
           $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.products')->with($notification);

        }else{
            $notification=array(
                'messege'=>'Oppss!! 3 Images Must Be Uploaded',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }
       }else{
            DB::table('products')->where('product_id',$id)->update($data);
            $notification=array(
                'messege'=>'Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('view.products')->with($notification);
       }

    }

    public function deleteProduct($id){
        DB::table('products')->where('product_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('view.products')->with($notification);
    }

    public function activeProduct($id){
        DB::table('products')->where('product_id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.products')->with($notification);
    }

    public function inActiveProduct($id){
        DB::table('products')->where('product_id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Active SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->route('view.products')->with($notification);
     }

     public function viewProductDetails($id){
        $info=DB::table('products')->where('product_id',$id)->first();

        $product=DB::table('products')
                ->join('categories','products.product_category_id','categories.category_id')
                ->join('brands','products.product_brand_id','brands.brand_id')
                ->where('product_id',$id)
                ->select('products.*','brands.brand_name','categories.category_name')
                ->first();


        return view('admin.productDetails',compact('product'));
     }
}
