
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

                            <input type="hidden" name="id" id="id" value="{{$product->product_id}}">
                            <input type="hidden" name="image" id="image" value="{{$images[0]}}">
                            <input type="hidden" name="name" id="name" value="{{$product->product_name}}">
                        <?php
                            $offer=false;
                            if(date('Y-m-d') >= $product->offer_start_date && date('Y-m-d') <= $product->offer_end_date){
                                $offer=true;
                            }
                        ?>
                        @if ($offer)
                            <h5> <small><del>৳ {{$product->selling_price}}</del></small>
                            ৳{{sprintf('%.d',$product->selling_price-($product->selling_price *($product->offer_perchentage/100)))}}</h5>
                            <input type="hidden" name="price" id="price" value = "{{sprintf('%.d',$product->selling_price-($product->selling_price *($product->offer_perchentage/100)))}}">
                        @else
                            <h5> ৳ {{$product->selling_price}}</h5>
                            <input type="hidden" name="price" id="price" value="{{$product->selling_price}}">
                        @endif

                        @if ($product->qty<=0)
                            <p class="available-stock">Availablity: <span> Stock Out</span><p>
                        @else
                        <p class="available-stock">Availablity: <span>Stock In</span><p>
                        @endif

                        @isset($product->weight)
                        <p class="available-stock">Weight: <span>{{$product->weight}} Kg</span><p>
                        <input type="hidden" name="weight" id="weight" value="{{$product->weight}}" id="">
                        @endisset

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" name="qty" id="qty" value="1" min="0" max="20" type="number">
                                </div>
                            </div>
                            @isset($product->size)
                                @php
                                    $size=explode(",",$product->size);
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Size</label>
                                        <select class="form-control" name="size" id="size">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Color</label>
                                        <select class="form-control" name="color" id="color">
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
                                <button class="btn hvr-hover text-white" onclick="sendData()">Add To Cart</button>


							</div>
						</div>
                    </div>
                </div>
            </div>
