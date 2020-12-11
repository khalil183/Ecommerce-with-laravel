@extends('layouts.app')
@section('content')
     <div class="container">
         <div class="text-center py-5">
            <img width="600px" src="{{asset('public/order.png')}}" alt="">
            <h1 class="h2">Your order is completed!</h1>
            <h2>Order Id: {{$track_id}}</h2>
            <h3>Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.</h3>
         </div>
     </div>

@endsection
