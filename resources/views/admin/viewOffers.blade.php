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
                            <h3 class="panel-title">All Offer </h3>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Offer</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Offer Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->product_name}}</td>
                                                    <td>{{$item->product_code}}</td>
                                                    <td>{{$item->offer_perchentage}}</td>
                                                    <td>{{$item->offer_start_date}}</td>
                                                    <td>{{$item->offer_end_date}}</td>
                                                    <td>
                                                        @if (date('Y-m-d') >= $item->offer_start_date && date('Y-m-d') <= $item->offer_end_date)
                                                            <span class="badge badge-primary">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-Active</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('edit.specifice.offer',$item->product_id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                                        <a href="{{route('delete.specifice.offer',$item->product_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>


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
