<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('public/frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('public/frontend/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>Bangla</option>

						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> 01796726183</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="{{route('my.account')}}"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a data-toggle="modal" data-target="#tracorder" href="#" ><i class="fas fa-location-arrow"></i> Track Order</a></li>
                            <!-- Modal -->
                            <div class="modal fade" id="tracorder" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Order Tracking Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('order.track')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input name="order_id" type="text" placeholder="Place Order Id" class="form-control">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img height="50px" src="{{asset('public/frontend/images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('cart.details')}}">Cart</a></li>
                                <li><a href="{{route('checkout')}}">Checkout</a></li>
                                <li><a href="{{route('whislist')}}">Wishlist</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{route('about.us')}}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contact.us')}}">Contact Us</a></li> --}}
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">

                    <ul>
                        <li>
                            <a href="{{route('cart.details')}}">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge" id="total">{{Cart::count()}}</span>
                            </a>
                        </li>
                        <li class="side-menu">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="" class="close-side"><i class="fa fa-times"></i></a>
                <li>
                    <form action="{{route('product.search')}}" method="GET">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="search_name" placeholder="Search Product">
                        </div>
                        <button class="btn btn-outline-light" type="submit">Search Here</button>
                    </form>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    @yield('content')


    {{-- Product Details Modal --}}

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Product Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body" id="product_details_modal">
                        {{-- Load Product DEtails --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end Product Details Modal --}}

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">

                        @guest
                            <div class="footer-top-box">
                                <h3>Newsletter</h3>
                                <form method="POST" action="{{route('subscribe')}}" class="newsletter-box">
                                    @csrf
                                    <div class="form-group">
                                        <input class="" type="email" name="email" placeholder="Email Address*" />
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <button class="btn hvr-hover" type="submit">Subscribe</button>
                                </form>
                            </div>
                        @else
                        @php
                        $count=DB::table('subscribers')->where('user_id',Auth::user()->id)->count();
                        @endphp
                        @if ($count==0)
                            <div class="footer-top-box">
                                <h3>Newsletter</h3>
                                <form method="POST" action="{{route('subscribe')}}" class="newsletter-box">
                                    @csrf
                                    <div class="form-group">
                                        <input class="" type="email" name="email" placeholder="Email Address*" />
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <button class="btn hvr-hover" type="submit">Subscribe</button>
                                </form>
                            </div>
                        @else
                            <div class="footer-top-box">
                                <h3>Newsletter</h3>
                                <form method="POST" action="{{route('unsubscribe')}}" class="newsletter-box">
                                    @csrf
                                    <div class="form-group">
                                        <input class="" type="email" name="email" placeholder="Email Address*" />
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <button class="btn hvr-hover" type="submit">UnSubscribe</button>
                                </form>
                            </div>

                        @endif
                        @endguest


					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<ul>
                                <li><a href="https://www.facebook.com/aboutkhalil"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About My Wibsite</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">Customer Service</a></li>
                                <li><a href="javascript:void(0)">Our Sitemap</a></li>
                                <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Dhaka,Bangladesh <br>Gabtoli,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">01796726183</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">khalil.cmt.bpi@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; <?= date('Y') ?> Developed By <a href="https://www.facebook.com/aboutkhalil">Ibrahim khalil</a>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('public/frontend/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('public/frontend/js/inewsticker.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootsnav.js.')}}"></script>
    <script src="{{asset('public/frontend/js/images-loded.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/isotope.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/contact-form-script.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom.js')}}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
          @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                     toastr.info("{{ Session::get('messege') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                   toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
          @endif
       </script>

       <script>
           function productDetails(id){
            $.ajax({
                type:"get",
                url: "{{url('/model-view-product')}}"+"/"+id,
                success:function(res){
                      $("#product_details_modal").html(res);


                }
            })

           }

           function sendData(){
                id = $('#id').val();
                name = $('#name').val();
                price = $('#price').val();
                qty = $('#qty').val();
                image = $('#image').val();
                color = $('#color').val();
                size = $('#size').val();
                weight = $('#weight').val();

                $.ajax({
                    type:"POST",
                    url: "{{url('/add-cart')}}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id,
                        name:name,
                        price:price,
                        qty:qty,
                        image:image,
                        color:color,
                        size:size,
                        weight:weight
                    },
                    success:function(response){
                        if(response.success){
                            toastr.success(response.success)
                            $("#modelId").modal('hide')
                            var total=$("#total").html();
                            total= total * 1 + response.qty*1;
                            $("#total").html(total);

                        }
                        if(response.error){
                            toastr.error(response.error)
                            $("#modelId").modal('hide')
                        }
                    },
                });
           }

           function beforWhislist(){
               toastr.error("At First Login Your Account. <a href='{{route('login')}}'>Login Here</a>")
           }

           function addWhislist(id){
               $.ajax({
                   type:"get",
                   url:"{{url('/add-to-whislist/')}}"+"/"+id,
                   success:function(res){
                       if(res.success){
                        toastr.success(res.success)
                       }
                       if(res.error){
                        toastr.error(res.error)
                       }


                   }
               })
           }


    </script>


</body>

</html>
