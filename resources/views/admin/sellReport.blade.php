@extends('admin.adminLayout')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-info" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                        <div class="card-body">
                            <form action="{{route('today.sell.report')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="date">Searh For ToDay Sells Report</label>
                                    <input required type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info" style="padding:10px;background:rgb(6, 137, 155);margin-bottom:10px">
                        <div class="card-body">
                            <form action="{{route('monthly.sell.report')}}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="month">Searh For Monthly Sells Report</label>
                                    <select required name="month" id="month" class="form-control">
                                        <option value="">Select Month</option>
                                         <option value="01">January</option>
                                         <option value="02">February</option>
                                         <option value="03">March</option>
                                         <option value="04">April</option>
                                         <option value="05">May</option>
                                         <option value="06">June</option>
                                         <option value="07">July</option>
                                         <option value="08">August</option>
                                         <option value="09">September</option>
                                         <option value="10">October</option>
                                         <option value="11">November</option>
                                         <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                        <div class="card-body">
                            <form action="{{route('yearly.sell.report')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="year">Searh For ToDay Sells Report</label>
                                    <input required type="text" name="year" id="year" class="form-control" placeholder="2020">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>

            <div class="panel-heading">
                @isset($today)
                    <h3 class='text-success'>{{$today}} Total Sell :- {{$total}} Tk</h3>
                @endisset
                @isset($month)
                    <h3 class='text-success'>{{$month}} Month Total Sell :- {{$total}} Tk</h3>
                @endisset
                @isset($year)
                    <h3 class='text-success'>{{$year}} Month Total Sell :- {{$total}} Tk</h3>
                @else
                    <h3 class='text-success'>Total Sell :-</h3>
                @endisset


            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
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

                                @isset($orders)
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
                                @endisset
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- End Row -->
        </div>
        </div>
        </div>
@endsection
