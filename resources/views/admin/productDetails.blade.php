<table class="table table-bordered">
    <tr>
        <td>Product Name</td>
        <td>{{$product->product_name}}</td>
    </tr>
    <tr>
        <td>Product Code</td>
        <td>{{$product->product_code}}</td>
    </tr>
    <tr>
        <td>Product Slug</td>
        <td>{{$product->product_slug}}</td>
    </tr>

    <tr>
        <td>Category Name</td>
        <td>{{$product->category_name}}</td>
    </tr>

    @php
        $sub_cat=DB::table('sub_categories')->where('sub_category_id',$product->product_sub_category_id)->first();
    @endphp
    @isset($sub_cat)
    <tr>
        <td>Sub-Category Name</td>
        <td>{{$sub_cat->sub_category_name}}</td>
    </tr>
    @endisset

    <tr>
        <td>Brand Name</td>
        <td>{{$product->brand_name}}</td>
    </tr>
    <tr>
        <td>Buying Price</td>
        <td>{{$product->buying_price}}</td>
    </tr>

    <tr>
        <td>Selling Price</td>
        <td>{{$product->selling_price}}</td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td>{{$product->qty}}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            @if ($product->status==1)
            <span class="badge badge-primary">Active</span>
        @else
            <span class="badge badge-danger">In-Active</span>
        @endif
        </td>
    </tr>
    <tr>
        <td>Video Link</td>
        <td>{{$product->video_link}}</td>
    </tr>
    <tr>
        <td>Size</td>
        <td>{{$product->size}}</td>
    </tr>
    <tr>
        <td>Color</td>
        <td>{{$product->color}}</td>
    </tr>
    <tr>
        <td>Weight</td>
        <td>{{$product->weight}}</td>
    </tr>
    <tr>
        <td>BuyOne GetOne</td>
        <td>
            @if ($product->buyone_getone==1)
                <span class="badge badge-primary">Available</span>
            @else
                <span class="badge badge-danger">Not-Available</span>
            @endif
        </td>
    </tr>
    <tr>
        <td>Offer Perchentage</td>
        <td>{{$product->offer_perchentage}}</td>
    </tr>
    <tr>
        <td>Offer Start Date</td>
        <td>{{$product->offer_start_date}}</td>
    </tr>
    <tr>
        <td>Offer End Date</td>
        <td>{{$product->offer_end_date}}</td>
    </tr>
    <tr>
        <td>Images</td>
        <td>
            @php
                $images=json_decode($product->product_images);
            @endphp
            <img class="img-thumbnail" src="{{url($images[0])}}" width="100px" alt="">
            <img class="img-thumbnail" src="{{url($images[1])}}" width="100px" alt="">
            <img class="img-thumbnail" src="{{url($images[2])}}" width="100px" alt="">
        </td>
    </tr>
    <tr>
        <td>Sort Desciption</td>
        <td>
            {{$product->sort_des}}
        </td>
    </tr>
    <tr>
        <td>Long Desciption</td>
        <td>
            {!! $product->long_des !!}
        </td>
    </tr>








</table>
