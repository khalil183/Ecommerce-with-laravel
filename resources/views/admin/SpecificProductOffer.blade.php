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
                            @if (isset($product))
                                Update Offer
                            @else
                                Add Product Offer
                            @endif


                            <a href="{{route('view.offers')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Offers</a></h3></div>
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
                            <form role="form" action="{{isset($product)?route('update.specifice.offer',$product->product_id):route('store.specific.offer')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="select_product">Product Name</label>
                                    @isset($product)
                                        <input readonly value="{{isset($product)?$product->product_name:''}}" type="text" class="form-control" name="product_name">
                                    @else
                                    <select name="product_name" id="select_product" class="form-control">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $item)
                                            <option @isset($product)
                                               {{ $product->product_id == $item->product_id?'readonly':''}}
                                            @endisset value="{{$item->product_id}}">{{$item->product_name}}</option>
                                        @endforeach

                                    </select>
                                    @endisset

                                </div>

                                <div class="form-group">
                                    <label for="addPercentage">Offer Percentage</label>
                                    <input value="{{isset($product)?$product->offer_perchentage:''}}" type="number" name="offer_perchentage" class="form-control" id="addPercentage" placeholder="Offer Percentage">
                                </div>



                                <div class="form-group">
                                    <label for="startDate">Offer Start Date</label>
                                    <input value="{{isset($product)?$product->offer_start_date:''}}" type="date" name="offer_start_date" class="form-control" id="startDate" placeholder="Offer Start Date">
                                </div>
                                <div class="form-group">
                                    <label for="endDate">Offer End Date</label>
                                    <input value="{{isset($product)?$product->offer_end_date:''}}" type="date" name="offer_end_date" class="form-control" id="endDate" placeholder="Offer End Date">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                    @if (isset($product))
                                Update Offer
                            @else
                            Add Offer
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



