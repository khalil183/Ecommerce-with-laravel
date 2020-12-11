@extends('layouts.app')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Personal Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">My Information</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="container py-5">
        <div class="my-account-page">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-box text-left">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('order-info')}}"> <i class="fa fa-gift"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('whislist')}}"> <i class="fa fa-heart"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('personal.info')}}"> <i class="fa fa-location-arrow"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('my-review')}}"> <i class="fa fa-star"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Name</label>
                                        <input readonly type="text" value="{{$user->name}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input readonly type="text" value="{{$user->email}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Mobile Number</label>
                                        <input readonly type="text" value="{{$user->phone}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Address</label>
                                        <textarea readonly cols="30" rows="3" class="form-control">{{$user->address}}</textarea>

                                    </div>

                                </div>
                                <a href="" class="btn hvr-hover text-light bg-info">Edit Password</a>
                                <a href="" class="btn hvr-hover text-light">Edit Profile</a>
                                <a href="{{route('user.logout')}}" class="btn hvr-hover text-light bg-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
