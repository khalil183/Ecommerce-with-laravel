@extends('layouts.app')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">My Orders</li>
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
                                                    <a data-toggle="tooltip" title="View Whislist" href="{{route('whislist')}}"> <i class="fa fa-heart"></i> </a>
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
                            <div class="col-md-10 mt-3">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>SI</th>
                                           <th>Order Id</th>
                                           <th>Qty</th>
                                           <th>Total Amount</th>
                                           <th>Status</th>
                                           <th>Date</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @php
                                           $i=1;
                                       @endphp
                                       @foreach ($orders as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->order_track_id}}</td>
                                            <td>{{$item->order_qty}}</td>
                                            <td>{{$item->order_total}} Tk</td>
                                            <td>active</td>
                                            <td>{{$item->order_day}}</td>
                                            <td><span class="btn btn-info" data-toggle="modal" data-target="#modelId-{{$item->order_id}}">view</span></td>
                                        </tr>
                                       @endforeach
                                   </tbody>

                               </table>
                               {{$orders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @foreach ($orders as $item)
    <div class="modal fade" id="modelId-{{$item->order_id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order id : {{$item->order_track_id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $details=DB::table('order_products')->where('order_id',$item->order_id)->get();
                                @endphp
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->product_size}}</td>
                                        <td>{{$item->product_color}}</td>
                                        <td>{{$item->product_qty}}</td>
                                        <td>{{$item->product_price * $item->product_qty}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
