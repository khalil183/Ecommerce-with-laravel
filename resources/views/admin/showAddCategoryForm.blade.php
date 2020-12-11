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
                            @if (isset($category))
                                Update Category
                            @else
                            Add Category
                            @endif


                            <a href="{{route('view.categories')}}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Categories</a></h3></div>
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
                            <form role="form" action="{{isset($category)?route('update.category',$category->category_id):route('store.category')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="addCategory">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="addCategory" placeholder="Category Name" value="{{isset($category)?$category->category_name:''}}">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">
                                    @if (isset($category))
                                Update Category
                            @else
                            Add Category
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



