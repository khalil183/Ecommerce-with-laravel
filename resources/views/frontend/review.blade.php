@extends('layouts.app')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Review</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">My Review</li>
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
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('whislist')}}"> <i class="fa fa-heart"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="account-box">
                                            <div class="service-box">
                                                <div class="service-icon">
                                                    <a href="{{route('order-info')}}"> <i class="fa fa-gift"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-10">
                               {{-- <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>SI</th>
                                           <th>Order Id</th>
                                           <th>Qty</th>
                                           <th>Total Amount</th>
                                           <th>Status</th>
                                           <th>Date</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                           <td>3</td>
                                           <td>34545433</td>
                                           <td>5</td>
                                           <td>559494</td>
                                           <td>active</td>
                                           <td>31-12-1999</td>
                                           <td><span class="btn btn-info">view</span></td>
                                       </tr>
                                   </tbody>
                               </table> --}}
                               <h1 class="text-center text-danger">Opppsss!! Review Not AVailable!!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
