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
                            @if (isset($cupon))
                                Update Cupon
                            @else
                                Add Cupon
                            @endif


                            <a href="{{route('view.cupon')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Cupons</a></h3></div>
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
                            <form role="form" action="{{isset($cupon)?route('update.cupon',$cupon->cupon_id):route('store.cupon')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="addcupon">Cupon Name</label>
                                    <input type="text" name="cupon_name" class="form-control" id="addcupon" placeholder="Cupon Name" value="{{isset($cupon)?$cupon->cupon_name:''}}">
                                </div>
                                <div class="form-group">
                                    <label for="cupon_offer">Cupon Offer</label>
                                    <input type="text" name="cupon_offer" class="form-control" id="cupon_offer" placeholder="Cupon Offer" value="{{isset($cupon)?$cupon->cupon_offer:''}}">
                                </div>


                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                    @if (isset($cupon))
                                Update Cupon
                            @else
                            Add Cupon
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



