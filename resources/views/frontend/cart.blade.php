@extends('layouts.app')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    @if (count($content)>0)
        <!-- Start Cart  -->
        <div class="cart-box-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($content as $item)


                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="{{url($item->options->image)}}">
                                        <img class="img-fluid" src="{{url($item->options->image)}}" alt="" />
                                    </a>
                                        </td>
                                        <td class="name-pr">
                                            <p>{{$item->name}}</p>
                                        </td>
                                        <td class="price-pr">
                                            <p>৳ {{$item->price}}</p>
                                        </td>
                                        <td class="quantity-box">
                                            <form method="POST" action="{{route('update.cart',$item->rowId)}}">
                                                @csrf
                                            <input name="qty" type="number" value="{{$item->qty}}" class="c-input-text qty text w-75">
                                            <button type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                        </td>
                                        <td class="total-pr">
                                            <p>৳ {{$item->qty * $item->price}}</p>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="{{route('cart.item.delete',$item->rowId)}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-lg-6 col-sm-6">
                        <div class="coupon-box">
                            <form method="POST" action="{{route('apply.cupon')}}">
                                @csrf
                            <div class="input-group input-group-sm">
                                <input name="cupon" class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-lg-8 col-sm-12"></div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="order-box">
                            <h3>Order summary</h3>
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> ৳ {{Cart::priceTotal()
                                }} </div>
                            </div>
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> ৳ {{Cart::discount()
                                }} </div>
                            </div>
                            <div class="d-flex">
                                <h4>Tax</h4>
                                <div class="ml-auto font-weight-bold"> $ 0.00 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> ৳ {{Cart::total()}} </div>
                            </div>
                            <hr> </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"><a href="{{route('checkout')}}" class="ml-auto btn hvr-hover">Checkout</a></div>
                </div>

            </div>
        </div>
    @else

    <div class="text-center">
        <img src="{{asset("public/cart.png")}}" class="img-fluid" alt="Image">
    </div>

    @endif
    <!-- End Cart -->
@endsection
