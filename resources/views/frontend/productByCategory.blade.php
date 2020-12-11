@extends('layouts.app')
@section('content')
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                @if (count($products)<=0)
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                        <div class="text-center">
                            <img src="{{asset("public/not-found.jpg")}}" class="img-fluid" alt="Image">
                        </div>
                    </div>

                @else
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <p>Showing all results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a id="grid-show" class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row" id="grid_view">
                                        @foreach ($products as $grid_item)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
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
                                        {{ $products->links() }}
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    @foreach ($products as $item)
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <?php
                                                            $offer=false;
                                                            if(date('Y-m-d') >= $item->offer_start_date && date('Y-m-d') <= $item->offer_end_date){
                                                                $offer=true;
                                                            }
                                                        ?>
                                                            <div class="type-lb">
                                                                @if ($offer==true)
                                                            <p class="sale">{{$item->offer_perchentage}}% off</p>
                                                        @endif
                                                            </div>
                                                            @php
                                                            $images=json_decode($item->product_images);
                                                        @endphp
                                                            <img src="{{asset($images[0])}}" class="img-fluid" alt="Image">
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="{{route('product.details',$item->product_slug)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                    <li></li>
                                                                    <li>
                                                                        @guest
                                                                    <a onclick="beforWhislist()" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                                @else
                                                                    <a onclick="addWhislist({{$item->product_id}})" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                                @endguest
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>{{$item->product_name}}</h4>

                                                        @if ($offer)
                                                            <h5> <small><del>৳ {{$item->selling_price}}</del></small>
                                                            ৳{{sprintf('%.d',$item->selling_price-($item->selling_price *($item->offer_perchentage/100)))}}</h5>
                                                        @else
                                                            <h5> ৳ {{$item->selling_price}}</h5>
                                                        @endif

                                                        @if ($item->qty<=0)
                                                            <p class="available-stock">Availablity: <span> Stock Out</span><p>
                                                        @else
                                                        <p class="available-stock">Availablity: <span>Stock In</span><p>
                                                        @endif

                                                        @isset($item->weight)
                                                        <p class="available-stock">Weight: <span>{{$item->weight}} Kg</span><p>
                                                        <input type="hidden" name="weight" id="weight" value="{{$item->weight}}" id="">
                                                        @else
                                                            <p class="available-stock">Weight: <span>Null</span><p>
                                                        @endisset
                                                        <a href="javascript:void(0)" class="btn hvr-hover" data-toggle="modal" data-target="#modelId" onclick="productDetails({{$item->product_id}})">Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  @endif


				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="{{route('product.search')}}">
                                @csrf
                                <input name="search_name" class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                @foreach ($categories as $item)
                                    @php
                                        $count=DB::table('sub_categories')->where('category_id',$item->category_id)->count();
                                        $cat_qty=DB::table('products')->where('product_category_id',$item->category_id)->count();
                                    @endphp
                                    @if ($count>0)
                                    <div class="list-group-collapse sub-men">
                                        <a class="list-group-item list-group-item-action" href="#sub-men-{{$item->category_id}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{$item->category_name}} <small class="text-muted">({{$cat_qty}})</small>
                                        </a>
                                        <div class="collapse" id="sub-men-{{$item->category_id}}" data-parent="#list-group-men">
                                            <div class="list-group">
                                                @php
                                                    $sub_cat=DB::table('sub_categories')->where('category_id',$item->category_id)->get();
                                                    $sub_cat_qty=DB::table('products')->where('product_sub_category_id',$item->category_id)->count();
                                                @endphp
                                                @foreach ($sub_cat as $item)
                                                    @php
                                                        $sub_cat_qty=DB::table('products')->where('product_sub_category_id',$item->sub_category_id)->count();
                                                    @endphp
                                                    <a href="{{route('product.by.sub.category',$item->sub_category_slug)}}" class="list-group-item list-group-item-action">{{$item->sub_category_name}} <small class="text-muted">({{$sub_cat_qty}})</small></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <a href="{{route('product.by.category',$item->category_slug)}}" class="list-group-item list-group-item-action"> {{$item->category_name}}  <small class="text-muted">({{$cat_qty}}) </small></a>

                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Brands</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                @foreach ($brands as $item)
                                @php
                                     $brand_qty=DB::table('products')->where('product_brand_id',$item->brand_id)->count();
                                @endphp

                                <a href="{{route('product.by.brand',$item->brand_slug)}}" class="list-group-item list-group-item-action">{{$item->brand_name}} <small class="text-muted">({{$brand_qty}})</small></a>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
@endsection
