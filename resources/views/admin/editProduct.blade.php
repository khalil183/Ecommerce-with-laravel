@extends('admin.adminLayout')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                 <!-- Basic example -->
                 <div class="col-md-1"></div>
                 <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Product
                            <a href="{{route('view.products')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Categories</a></h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                        <form role="form" method="POST" action="{{route('update.product',$product->product_id)}}" enctype="multipart/form-data">
                            @csrf

                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" value="{{$product->product_name}}">
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_code">Product Code</label>
                                        <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code" value="{{$product->product_code}}">
                                    </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subCat">Main Category Name</label>
                                        <select onchange="subCategory()" class="form-control" name="cat_id" id="cat_id">
                                            <option value="">Select Main Category</option>
                                            @foreach ($categories as $item)
                                                <option {{$product->product_category_id==$item->category_id?'selected':''}} value="{{$item->category_id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addCategory">Sub Category Name</label>
                                        <select name="sub_cat" id="sub_cat" class="form-control">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>

                                   </div>
                               </div>

                               <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="product_brand_id">Product Brand</label>
                                     <select name="product_brand_id" id="product_brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $item)
                                        <option {{$product->product_brand_id== $item->brand_id?'selected':''}} value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="qty">Product Quantity</label>
                                     <input type="number" name="qty" id="qty" class="form-control" placeholder="Product Quantity" value="{{$product->qty}}">
                                 </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="buying_price">Buying Price</label>
                                        <input type="number" name="buying_price" id="buying_price" class="form-control" placeholder="Buying Price" value="{{$product->buying_price}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" name="selling_price" id="selling_price" class="form-control" placeholder="Selling Price" value="{{$product->selling_price}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" >Product Size</label>
                                        <br>
                                        <input name="size" id="size" class="form-control" value="{{$product->size}}" placeholder="Product Size" data-role="tagsinput"/>
                                    </div><!-- form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Product Color</label>
                                        <br>
                                        <input type="text" name="color" id="color" class="form-control" placeholder="Selling Price" value="{{$product->color}}" data-role="tagsinput">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight">Product Weight</label>
                                        <input type="text" name="weight" id="weight" class="form-control" placeholder="Product Weight" value="{{$product->weight}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="video_link">video Link</label>
                                        <input type="text" name="video_link" id="video_link" class="form-control" placeholder="video Link" value="{{$product->video_link}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sort_des">Sort Description</label>
                                        <textarea name="sort_des" class="form-control" id="sort_des" cols="30" rows="5" placeholder="Type Somethings">{{$product->sort_des}}</textarea>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="long_dsc">Sort Description</label>
                                        <textarea name="long_des" class="form-control summernote" id="long_dsc" cols="30" rows="5" placeholder="Type Somethings">{{$product->long_des}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_images">Images</label>
                                        <input type="file" name="product_images[]" multiple id="product_images" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="checkbox" {{$product->buyone_getone==1?'checked':''}} value="1" name="buyone_getone" id="buyone_getone">
                                        <label for="byeone_getone">BuyeONe getOne <small>(Checkd Means Yes)</small></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" {{$product->status==1?'checked':''}} value="1" name="status" id="status">
                                        <label for="status">Product Status <small>(Checkd Means Active)</small></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Old Images</label>
                                    <input type="hidden" name="product_old_images" value="{{$product->product_images}}">
                                    @php
                                        $images=json_decode($product->product_images);
                                    @endphp
                                    <img class="img-thumbnail" src="{{url($images[0])}}" width="100px" alt="">
                                    <img class="img-thumbnail" src="{{url($images[1])}}" width="100px" alt="">
                                    <img class="img-thumbnail" src="{{url($images[2])}}" width="100px" alt="">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Add Product</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>



        </div> <!-- container -->

    </div> <!-- content -->


</div>

<script>
    function subCategory(){

        var cat_id=$('#cat_id').val();
        $.ajax({
            type:"get",
            url:"{{route('search.sub.category')}}",
            data:{cat_id:cat_id},
            success:function(res){
                $('#sub_cat').html(res);
            }
        })
    }
</script>



@endsection
