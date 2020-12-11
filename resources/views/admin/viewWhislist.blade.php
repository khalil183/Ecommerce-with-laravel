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
                            <h3 class="panel-title">All Whislists</h3>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>User Name</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($whislists as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->product_name}}</td>
                                                    <td>{{$item->product_code}}</td>
                                                    <td>
                                                        @php
                                                            $images=json_decode($item->product_images);
                                                        @endphp
                                                        <img src="{{url($images[0])}}" width="100px" alt="">

                                                    </td>
                                                    <td>
                                                        @if ($item->status==1)
                                                            <span class="badge badge-primary">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-Active</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('delete.whislist',$item->whislist_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                        @if ($item->status==1)
                                                            <a href="{{route('inactive.whislist',$item->whislist_id)}}" class="btn btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
                                                        @else
                                                            <a href="{{route('active.whislist',$item->whislist_id)}}" class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></i></a>
                                                        @endif


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
