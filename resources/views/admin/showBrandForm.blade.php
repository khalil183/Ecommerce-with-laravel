@extends('admin.adminLayout')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                 <!-- Basic example -->
                 <div class="col-md-3"></div>
                 <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">
                            @if (isset($brand))
                                Update Brand
                            @else
                                Add Brand
                            @endif


                            <a href="{{route('view.brand')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Brands</a></h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form role="form" action="{{isset($brand)?route('update.brand',$brand->brand_id):route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="addbrand">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="addbrand" placeholder="Brand Name" value="{{isset($brand)?$brand->brand_name:''}}">
                                </div>

                                <div class="form-group">
                                    <label for="branImage">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="branImage">
                                </div>

                                @if (isset($brand))
                                <div class="form-group">
                                    <label for="branImage">Old Image</label>
                                    <img src="{{url($brand->brand_image)}}" alt="imges">
                                    <input type="hidden" name="old_brand_image" class="form-control" value="{{$brand->brand_image}}" id="branImage">
                                </div>
                                @endif

                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                    @if (isset($brand))
                                Update Brand
                            @else
                            Add Brand
                            @endif
                                </button>
                            </form>


                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>



        </div> <!-- container -->

    </div> <!-- content -->

</div>
@endsection



