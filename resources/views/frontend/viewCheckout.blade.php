@extends('layouts.app')
@section('content')
        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Checkout</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start Cart  -->
        <div class="cart-box-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="title-left">
                                <h3>Billing address</h3>
                            </div>
                            <form method="POST" action="{{route('store.shipping.info')}}" class="needs-validation">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name *</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                                        <div class="invalid-feedback"> First name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name *</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name">
                                        <div class="invalid-feedback"> Last name is required. </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="Phone">Phone *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                        <div class="invalid-feedback" style="width: 100%;">Phone Number is required. </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email Address </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="Division">Division *</label>
                                        <select name="division" class="form-control @error('division') is-invalid @enderror" id="Division">
                                            <option value="" data-display="Select">Choose...</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Sylet">Sylet</option>
                                            <option value="Moymonshing">Moymonshing</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Chattogram">Chattogram</option>
                                        </select>
                                        <div class="invalid-feedback"> Select Your Division</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="District">District *</label>
                                        <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="District" name="district" value="{{ old('district') }}">
                                    </select>
                                        <div class="invalid-feedback"> District is Required </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="Upozila">Upozila *</label>
                                        <input type="text" class="form-control @error('upozila') is-invalid @enderror" id="Upozila" placeholder="Upozila" name="upozila" value="{{ old('upozila') }}">
                                        <div class="invalid-feedback"> Upozila is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="zip">Zip *</label>
                                        <input value="{{ old('zip') }}" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" id="zip" placeholder="Zip">
                                        <div class="invalid-feedback"> Zip code is required. </div>
                                    </div>

                                </div>
                                <hr class="mb-4">
                                <div class="title"> <span>Payment</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" value="hand_cash" name="payment_method" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Hand Cash</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input id="debit" value="stripe" name="payment_method" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="debit">Stripe</label>
                                    </div>
                                    {{-- <div class="custom-control custom-radio">
                                        <input id="paypal" value="paypal" name="payment_method" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback"> Name on card is required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                        <div class="invalid-feedback"> Credit card number is required </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                        <div class="invalid-feedback"> Expiration date required </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                        <div class="invalid-feedback"> Security code required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="payment-icon">
                                            <ul>
                                                <li><img class="img-fluid" src="{{asset('public/frontend/images/payment-icon/1.png')}}" alt=""></li>
                                                <li><img class="img-fluid" src="{{asset('public/frontend/images/payment-icon/2.png')}}" alt=""></li>
                                                <li><img class="img-fluid" src="{{asset('public/frontend/images/payment-icon/3.png')}}" alt=""></li>
                                                <li><img class="img-fluid" src="{{asset('public/frontend/images/payment-icon/5.png')}}" alt=""></li>
                                                <li><img class="img-fluid" src="{{asset('public/frontend/images/payment-icon/7.png')}}" alt=""></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-1"> --}}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Shipping Method</h3>
                                    </div>
                                    <div class="mb-4">
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption1" value="sundorbon" name="shipping_method" class="custom-control-input" checked="checked" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">SundorBon</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                        <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption2" value="kortoya" name="shipping_method" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption2">Kortoya</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                        <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption3" value="others" name="shipping_method" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption3">Others</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Shopping cart</h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        @foreach (Cart::content() as $item)
                                            <div class="media mb-2 border-bottom">
                                                <div class="media-body"> <a href="detail.html"> {{$item->name}}</a>
                                                    <div class="small text-muted">Price: ৳{{$item->price}}<span class="mx-2">|</span> Qty: {{$item->qty}} <span class="mx-2">|</span> Subtotal: ৳{{$item->qty * $item->price}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Your order</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Product</div>
                                        <div class="ml-auto font-weight-bold">Total</div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"> ৳ {{Cart::priceTotal()
                                        }} </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Coupon Discount</h4>
                                        <div class="ml-auto font-weight-bold"> ৳ {{Cart::discount()
                                        }} </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Tax</h4>
                                        <div class="ml-auto font-weight-bold"> ৳ 0.00 </div>
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
                            <div class="col-12 d-flex shopping-box">
                                <button type="submit" class="ml-auto btn hvr-hover">Place Order</button> </div>

                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Cart -->
@endsection
