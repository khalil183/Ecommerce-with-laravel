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
                            <h3 class="panel-title">All Products <a href="{{route('add.product')}}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Products</a></h3>

                        </div>
                        <div class="panel-body table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Slug</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Image</th>
                                            <th>Qty</th>
                                            <th>Status</th>
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
                                                <td>{{$item->product_slug}}</td>
                                                <td>{{$item->category_name}}</td>
                                                <td>{{$item->brand_name}}</td>
                                                <td>
                                                    @php
                                                        $images=json_decode($item->product_images);
                                                    @endphp
                                                    <img src="{{$images[0]}}" width="60px" alt="">

                                                </td>
                                                <td>{{$item->qty}}</td>
                                                <td>
                                                    @if ($item->status==1)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">In-Active</span>
                                                    @endif
                                                </td>
                                                <td width="20%">
                                                    <a onclick="loadProduct({{$item->product_id}})" data-toggle="modal" data-target="#modelId"  href="#" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('edit.product',$item->product_id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('delete.product',$item->product_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    @if ($item->status==1)
                                                        <a href="{{route('inactive.product',$item->product_id)}}" class="btn btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
                                                    @else
                                                        <a href="{{route('active.product',$item->product_id)}}" class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></i></a>
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

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header">
                        <h5 class="modal-title">Product Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid" id="viewDetails">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function loadProduct(id){

        $.ajax({
            type:"get",
            url:"{{url('/view-product-details/')}}"+"/"+id,
            success:function(res){
                $('#viewDetails').html(res);



            }
        })

    }
</script>

@endsection
