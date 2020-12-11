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
                            @if (isset($slider))
                                Update Slider
                            @else
                                Add Slider
                            @endif


                            <a href="{{route('view.slider')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Sliders</a></h3></div>
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
                            <form role="form" action="{{isset($slider)?route('update.slider',$slider->slider_id):route('store.slider')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="select_product">Product Name</label>
                                    @isset($slider)
                                        <input readonly value="{{isset($slider)?$slider->product_name:''}}" type="text" class="form-control" name="product_name">
                                    @else
                                    <select name="product_slug" id="select_product" class="form-control">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $item)
                                            <option value="{{$item->product_slug}}">{{$item->product_name}}</option>
                                        @endforeach

                                    </select>
                                    @endisset

                                </div>

                                <div class="form-group">
                                    <label for="sliderThumbnail">Slider Thumbnail</label>
                                    <input value="{{isset($slider)?$slider->slider_thumbnail:''}}" type="text" name="slider_thumbnail" class="form-control" id="sliderThumbnail" placeholder="Slider Thumbnail">
                                </div>
                                <div class="form-group">
                                    <label for="startDate">Slider Image</label>
                                    <input  type="file" name="slider_image" class="form-control" id="startDate" placeholder="Slider Image">
                                </div>

                                @isset($slider)
                                    <div class="form-group">
                                        <label for="">Old Slider Image</label>
                                        <input type="hidden" value={{$slider->slider_image}} name="slider_old_image">
                                        <img src="{{url($slider->slider_image)}}" alt="" width="120px">

                                    </div>

                                @endisset

                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                    @if (isset($slider))
                                Update Slider
                            @else
                            Add Slider
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



