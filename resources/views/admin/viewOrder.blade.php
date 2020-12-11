@extends('admin.adminLayout')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Orders</h3>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Order Id</th>
                                                <th>Order Total</th>
                                                <th>Quantity</th>
                                                <th>Payment</th>
                                                <th>Date</th>
                                                <th>Status</th>
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
                                                    <td>{{$item->order_total}}</td>
                                                    <td>{{$item->order_qty}}</td>
                                                    <td>{{$item->payment_method}}</td>
                                                    <td>{{$item->order_day}}</td>
                                                    <td>
                                                        @if ($item->order_status=='0')
                                                        <span class="badge badge-danger">Pending</span>
                                                        @elseif($item->order_status=='1')
                                                        <span class="badge badge-info">Payment</span>
                                                        @elseif($item->order_status=='2')
                                                            <span class="badge badge-info">Proggress</span>
                                                        @elseif($item->order_status=='3')
                                                            <span class="badge badge-info">Delivered</span>
                                                        @else
                                                        <span class="badge badge-danger">Cancle</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('view.order',$item->order_id)}}" class="btn btn-success">View</a>


                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

</div>

@endsection
