@extends('admin.adminLayout')
@section('admin_content')
     <!-- ============================================================== -->
            <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right">Invoice</h4>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>User name:</strong> {{$order->name}}<br>
                                                <strong>User Email:</strong> {{$order->email}}<br>
                                                <strong>User Phone:</strong> {{$order->phone}}<br>
                                                <hr>
                                                <strong>Shipping name:</strong> {{$order->shipping_first_name." ".$order->shipping_last_name}}<br>
                                                <strong>Shipping Phone:</strong> {{$order->shipping_phone}}<br>
                                                <strong>Shipping Address:</strong> {{$order->shipping_upozila.'('.$order->shipping_zip_code.')'.','.$order->shipping_district.','.$order->shipping_division}}<br>


                                                </address>
                                        </div>

                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong> {{$order->order_day}}</p>
                                            <p><strong>Order Id: </strong> <span class="badge badge-primary">{{$order->order_track_id}}</span></p>

                                            @if ($order->order_status=='0')
                                                <p><strong>Order Status: </strong> <span class="badge badge-danger">Pending</span></p>
                                            @elseif($order->order_status=='1')
                                                <p><strong>Order Status: </strong> <span class="badge badge-info">Payment</span></p>
                                            @elseif($order->order_status=='2')
                                                <p><strong>Order Status: </strong> <span class="badge badge-info">Proggress</span></p>
                                            @elseif($order->order_status=='3')
                                                <p><strong>Order Status: </strong> <span class="badge badge-info">Delivered</span></p>
                                            @else
                                                <p><strong>Order Status: </strong> <span class="badge badge-danger">Cancle</span></p>
                                            @endif


                                            <p><strong>Payment Method:</strong> {{$order->payment_method}}</p>

                                            @if ($order->payment_status=='0')
                                                <p><strong>Payment Status: </strong> <span class="badge badge-danger">Pending</span></p>
                                            @else
                                                <p><strong>Payment Status: </strong> <span class="badge badge-success">Success</span></p>
                                            @endif

                                            @if ($order->transection_id)
                                            <p><strong>Transection:</strong> {{$order->transection_id}}</p>
                                            @endif

                                            <p><strong>Delevery Method:</strong> {{$order->order_ship_method}}</p>





                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach ($details as $item)
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{$item->product_name}}</td>
                                                            <td><img width="100px" src="{{url($item->product_image)}}" alt=""></td>
                                                            <td>{{$item->product_qty}}</td>
                                                            <td>{{$item->product_price}}</td>
                                                            <td>{{$item->product_size}}</td>
                                                            <td>{{$item->product_color}}</td>
                                                            <td>{{$item->product_price *$item->product_qty }}</td>
                                                        </tr>
                                                    @endforeach



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                    <div class="col-md-3 col-md-offset-9">
                                        <h3 class="text-right">Total: {{$order->order_total}} BDT</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="javascript:;" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        @if ($order->order_status=='0')
                                            <a href="{{url('/order-payment/'.$order->order_id)}}" class="btn btn-primary waves-effect waves-light"> Order Payment</a>
                                        @elseif($order->order_status=='1')
                                            <a href="{{url('/order-progress/'.$order->order_id)}}" class="btn btn-primary waves-effect waves-light">Progress Order</a>
                                        @elseif($order->order_status=='2')
                                            <a href="{{url('/order-delivered/'.$order->order_id)}}" class="btn btn-primary waves-effect waves-light">Order Delivered</a>
                                        @elseif($order->order_status=='4')
                                            <a href="{{url('/active-order/'.$order->order_id)}}" class="btn btn-primary waves-effect waves-light">Active Order</a>
                                        @endif

                                        @if ($order->order_status != '4')
                                            <a href="{{url('/cancle-order/'.$order->order_id)}}" class="btn btn-danger waves-effect waves-light">Cancle Order</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



    </div> <!-- container -->

        </div> <!-- content -->


    </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection
