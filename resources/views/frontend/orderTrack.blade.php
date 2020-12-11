@extends('layouts.app')
@section('content')
 <!-- End All Title Box -->
 <div class="container py-5">

    <div class="my-account-page">
        <div class="account-box">
            <div class="progress h-100" style="height: 100px">
                @if ($order->order_status==0)
                    <div class="progress-bar bg-danger" style="width: 25%">
                        Order Pending (25%)
                    </div>
                @endif
                @if ($order->order_status==1)
                    <div class="progress-bar bg-danger" style="width: 25%">
                        Order Pending (25%)
                    </div>
                    <div class="progress-bar bg-primary" style="width: 25%">
                        Order Accept (50%)
                    </div>
                @endif
                @if ($order->order_status==2)
                    <div class="progress-bar bg-danger" style="width: 25%">
                        Order Pending (25%)
                    </div>
                    <div class="progress-bar bg-primary" style="width: 25%">
                        Order Accept (50%)
                    </div>
                    <div class="progress-bar bg-success" style="width: 25%">
                        Order Packeging (75%)
                    </div>
                @endif
                @if ($order->order_status==3)
                    <div class="progress-bar bg-danger" style="width: 25%">
                        Order Pending (25%)
                    </div>
                    <div class="progress-bar bg-primary" style="width: 25%">
                        Order Accept (50%)
                    </div>
                    <div class="progress-bar bg-success" style="width: 25%">
                        Order Packeging (75%)
                    </div>
                    <div class="progress-bar bg-info" style="width: 25%">
                        Order Deliovered (100%)
                    </div>

                @endif
                @if ($order->order_status==4)
                    <div class="progress-bar bg-danger" style="width: 100%">
                        Order Cancled (100%)
                    </div>

                @endif

                <br>
                <br>
          </div>
          <div class="row mt-5">
              <div class="col-md-6 text-left">
                  <p>User Name: <strong>{{$order->name}}</strong></p>
                  <p>User Phone: <strong>{{$order->phone}}</strong></p>
                  <p>User Email: <strong>{{$order->email}}</strong></p>
                  <p>Shipped Name: <strong>{{$order->shipping_first_name." ". $order->shipping_last_name}}</strong></p>
                  <p>Shipped Email: <strong>{{$order->shipping_email}}</strong></p>
                  <p>Shipped Phone: <strong>{{$order->shipping_phone}}</strong></p>
                  <p>Shipped Address: <strong>{{$order->shipping_upozila.'('.$order->shipping_zip_code.')'.','.$order->shipping_district.','.$order->shipping_division}}</strong></p>
              </div>
              <div class="col-md-6 text-right">
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
          <div class="row mt-5">
              <div class="col">
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
        </div>
    </div>
</div>
@endsection
