@extends('layouts.app')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Whislist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Whislist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="container py-5">
        <div class="my-account-page">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-box text-left">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a data-toggle="tooltip" title="View Orders" href="{{route('order-info')}}"> <i class="fa fa-gift"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a data-toggle="tooltip" title="View Review" href="{{route('my-review')}}"> <i class="fa fa-star"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="wishlist-box-main" style="margin-top: -55px">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-main table-responsive">
                                                    @if (count($whislists)>0)
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Images</th>
                                                                <th>Product Name</th>
                                                                <th>Unit Price </th>
                                                                <th>Stock</th>
                                                                <th>Add Item</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($whislists as $item)
                                                                <tr id="remove-{{$item->whislist_id}}">
                                                                    <td class="thumbnail-img">
                                                                        @php
                                                                            $images=json_decode($item->product_images);
                                                                        @endphp
                                                                        <img class="img-fluid" src="{{asset($images[0])}}" alt="" />
                                                                    </td>
                                                                    <td class="name-pr">
                                                                        <p>{{$item->product_name}}</p>
                                                                    </td>
                                                                    <td class="price-pr">
                                                                        <p>৳ {{$item->selling_price}}</p>
                                                                    </td>
                                                                    @if ($item->qty>0)
                                                                        <td class="quantity-box">In Stock</td>
                                                                    @else
                                                                        <td class="quantity-box"> Stock Out</td>
                                                                    @endif


                                                                    <td class="add-pr">
                                                                    <a class="btn hvr-hover" href="{{route('product.details',$item->product_slug)}}">Add to Cart</a>
                                                                    </td>
                                                                    <td class="remove-pr">
                                                                        <a onclick="removeWhislist({{$item->whislist_id}})" href="javascript:void(0)">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @else
                                                        <h1 class="text-center text-danger">Whislist Product Not Available!!</h1>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Wishlist -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        function removeWhislist(id){

            $.ajax({
                type:"get",
                url:"{{url('/remove-whislist/')}}"+"/"+id,
                success:function(res){
                    toastr.success(res.success)
                    $("#remove-"+id).remove()
                }
            })
        }
    </script>
@endsection
