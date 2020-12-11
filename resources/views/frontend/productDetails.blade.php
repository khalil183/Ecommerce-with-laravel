@extends('layouts.app')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php
                                $images=json_decode($product->product_images);
                            @endphp
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset($images[0])}}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset($images[1])}}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset($images[2])}}" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset($images[0])}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{asset($images[1])}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{asset($images[2])}}" alt="" />
                            </li>

                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->product_name}}</h2>
                        @isset($product->product_sub_category_id)
                            @php
                                $sub=DB::table('sub_categories')->where('sub_category_id',$product->product_sub_category_id)->first();
                            @endphp
                            <p>Category: <small>{{$product->category_name}}  <i class="fa fa-arrow-right" aria-hidden="true"></i> {{$sub->sub_category_name}}</small></p>
                        @else
                        <p>Category: <small>{{$product->category_name}}</small></p>
                        @endisset
                        <p>Brand: {{$product->brand_name}}</p>
                        <form action="{{route('add.to.cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->product_id}}">
                            <input type="hidden" name="image" value="{{$images[0]}}">
                            <input type="hidden" name="name" value="{{$product->product_name}}">
                        <?php
                            $offer=false;
                            if(date('Y-m-d') >= $product->offer_start_date && date('Y-m-d') <= $product->offer_end_date){
                                $offer=true;
                            }
                        ?>
                        @if ($offer)
                            <h5> <small><del>৳ {{$product->selling_price}}</del></small>
                            ৳{{sprintf('%.d',$product->selling_price-($product->selling_price *($product->offer_perchentage/100)))}}</h5>
                            <input type="hidden" name="price" value = "{{sprintf('%.d',$product->selling_price-($product->selling_price *($product->offer_perchentage/100)))}}">
                        @else
                            <h5> ৳ {{$product->selling_price}}</h5>
                            <input type="hidden" name="price" value="{{$product->selling_price}}">
                        @endif

                        @if ($product->qty<=0)
                            <p class="available-stock">Availablity: <span> Stock Out</span><p>
                        @else
                        <p class="available-stock">Availablity: <span>Stock In</span><p>
                        @endif

                        @isset($product->weight)
                        <p class="available-stock">Weight: <span>{{$product->weight}} Kg</span><p>
                        <input type="hidden" name="weight" value="{{$product->weight}}" id="">
                        @endisset

						<h4>Short Description:</h4>
						<p>{{$product->sort_des}}</p>

                        <div class="row">
                            <div class="col-md-3 w-50">
                                <div class="form-group">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" name="qty" value="1" min="0" max="20" type="number">
                                </div>
                            </div>
                            @isset($product->size)
                                @php
                                    $size=explode(",",$product->size);
                                @endphp
                                <div class="col-md-3 w-50">
                                    <div class="form-group">
                                        <label class="control-label">Size</label>
                                        <select class="form-control" name="size" id="">
                                            <option value="">Select Size</option>
                                            @foreach ($size as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            @endisset

                            @isset($product->color)
                                @php
                                    $color=explode(",",$product->color);
                                @endphp
                                <div class="col-md-3 w-50">
                                    <div class="form-group">
                                        <label class="control-label">Color</label>
                                        <select class="form-control" name="color" id="">
                                            <option value="">Select Color</option>
                                            @foreach ($color as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endisset
                        </div>
						<div class="add-to-btn">
							<div class="add-comp">
                                {{-- <a class="btn hvr-hover" type="submit">Add to Cart</a> --}}
                                <button class="btn hvr-hover" type="submit">Add To Cart</button>
                        </form>

                                {{-- <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a> --}}
                            </div>

                        </div>
                        @guest
                            <button onclick="beforWhislist()" class="btn hvr-hover ml-2">Add to wishlist</button>
                        @else
                            <button onclick="addWhislist({{$product->product_id}})" class="btn hvr-hover ml-2">Add to wishlist</button>
                        @endguest


                    </div>
                    <br>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>


			<div class="row mt-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header"><h1>Product Review</h1></div>
                        <div class="card-body">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                        <div class="row" id="grid_view">
                            @php
                            $products=DB::table('products')->where('product_category_id',$product->product_category_id)->get();

                        @endphp
                            @foreach ($products as $grid_item)
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                    <div class="products-single fix">
                                        <div class="box-img-hover">
                                            <div class="type-lb">
                                                <?php
                                                    $offer=false;
                                                    if(date('Y-m-d') >= $grid_item->offer_start_date && date('Y-m-d') <= $grid_item->offer_end_date){
                                                        $offer=true;
                                                    }
                                                ?>
                                                @if ($offer==true)
                                                    <p class="sale">{{$grid_item->offer_perchentage}}% off</p>
                                                @endif

                                            </div>
                                            @php
                                                $images=json_decode($grid_item->product_images);
                                            @endphp
                                            <img src="{{asset($images[0])}}" class="img-fluid" alt="Image">
                                            <div class="mask-icon">
                                                <ul>
                                                <li><a href="{{route('product.details',$grid_item->product_slug)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                    <li></li>
                                                    <li>
                                                    @guest
                                                        <a onclick="beforWhislist()" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                    @else
                                                        <a onclick="addWhislist({{$grid_item->product_id}})" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                    @endguest
                                                    </li>
                                                </ul>
                                                <a onclick="productDetails({{$grid_item->product_id}})" class="cart" data-toggle="modal" data-target="#modelId" href="javascript:void(0)">Add to Cart</a>

                                            </div>
                                        </div>
                                        <div class="why-text">
                                            <h4>{{$grid_item->product_name}}</h4>
                                            @if ($offer)
                                                <h5> <small><del>৳ {{$grid_item->selling_price}}</del></small>
                                                ৳{{sprintf('%.d',$grid_item->selling_price-($grid_item->selling_price *($grid_item->offer_perchentage/100)))}}</h5>
                                            @else
                                                <h5> ৳ {{$grid_item->selling_price}}</h5>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=791714498044060&autoLogAppEvents=1" nonce="Pg6Bn7vI"></script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f9c2b6690c74500124aab25&product=inline-share-buttons" async="async"></script>
@endsection
