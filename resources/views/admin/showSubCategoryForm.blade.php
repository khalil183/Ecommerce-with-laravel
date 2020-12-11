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
                            @if (isset($subCategory))
                                Update Sub-Category
                            @else
                            Add Sub Category
                            @endif


                            <a href="{{route('view.sub.categories')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Sub-Categories</a>
                        </h3></div>
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
                        <form role="form" method="POST" action="{{isset($subCategory)?route('update.sub.category',$subCategory->sub_category_id):route('store.sub.category')}}">
                            @csrf
                                <div class="form-group">
                                    <label for="subCat">Main Category Name</label>
                                    <select class="form-control" name="category_id" id="subCat">
                                        <option value="">Select Main Category</option>
                                        @foreach ($categories as $item)
                                            <option @if (isset($subCategory))
                                            {{$item->category_id==$subCategory->category_id?'selected':''}}

                                            @endif value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="addCategory">Sub Category Name</label>
                                    <input type="text" value="{{isset($subCategory)?$subCategory->sub_category_name:''}}" name="sub_category_name" class="form-control" id="addCategory" placeholder="Sub Category Name">
                                </div>



                                <button type="submit" class="btn btn-purple waves-effect waves-light">@if (isset($subCategory))
                                    Update Sub-Category
                                @else
                                Add Sub Category
                                @endif</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>



        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection



