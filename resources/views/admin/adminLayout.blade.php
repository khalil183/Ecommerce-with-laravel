<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Admin</title>

        <!-- Base Css Files -->
        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" />


        <!-- Font Icons -->
        <link href="{{asset('public/backend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/backend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/backend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/backend/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('public/backend/css/waves-effect.css')}}" rel="stylesheet">

        <!-- DataTables -->
        <link href="{{asset('public/backend/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

            <!--bootstrap-wysihtml5-->
            <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
        <link href="{{asset('public/backend/assets/summernote/summernote.css')}}" rel="stylesheet" />

        <!-- Custom Files -->
        <link href="{{asset('public/backend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        {{-- <link href="{{asset('public/backend/assets/tagsinput/jquery.tagsinput.css')}}" rel="stylesheet" /> --}}

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

        <script src="{{asset('public/backend/js/modernizr.min.js')}}"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>



    <body class="fixed-left" onload="subCategory()">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{url('/')}}" class="logo"><i class="md md-terrain"></i> <span>Admin Panel </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('public/backend/images/avatar-1.jpg')}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{route('admin.logout')}}"><i class="md md-settings-power"></i> Logout</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('new.orders')}}">New Orders</a></li>
                                    <li><a href="{{route('payable.order')}}">Payable Orders</a></li>
                                    <li><a href="{{route('progress.order')}}">Progress Orders</a></li>
                                    <li><a href="{{route('delivered.order')}}">Delivered Orders</a></li>
                                    <li><a href="{{route('cancle.order')}}">Cancle Orders</a></li>
                                    <li><a href="{{route('all.orders')}}">All Orders</a></li>


                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.categories')}}">Manage Category</a></li>
                                     <li><a href="{{route('view.sub.categories')}}">Manage Sub Category</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Branads </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.brand')}}">Manage Branad</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.products')}}">Manage Products</a></li>


                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Offers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('specific.product.offer')}}">Specific Product Offer</a></li>
                                    <li><a href="{{route('all.product.offer')}}">All Product Offer</a></li>

                                    <li><a href="{{route('view.offers')}}">Manage Offer</a></li>
                                </ul>
                            </li>





                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Cupons </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.cupon')}}">Manage Cupons</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Whislists </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.whislist')}}">Manage Whislists</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Slider </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('view.slider')}}">Manage Slider</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Sells Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('sellsreport')}}">Sells Report</a></li>

                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-book"></i><span> Subscriber</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('subscriber')}}">Manage Subscriber</a></li>

                                </ul>
                            </li>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @yield('admin_content')
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

         <!-- jQuery  -->
         <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/backend/js/waves.js')}}"></script>
        <script src="{{asset('public/backend/js/wow.min.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/backend/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/backend/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

          <!-- sweet alerts -->
        <script src="{{asset('public/backend/assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <!-- flot Chart -->
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/backend/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>


          <!-- Counter-up -->
        <script src="{{asset('public/backend/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/backend/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>


        <!-- CUSTOM JS -->
        <script src="{{asset('public/backend/js/jquery.app.js')}}"></script>


         <!-- Dashboard -->
         <script src="{{asset('public/backend/js/jquery.dashboard.js')}}"></script>

<!-- Chat -->
<script src="{{asset('public/backend/js/jquery.chat.js')}}"></script>

<!-- Todo -->
<script src="{{asset('public/backend/js/jquery.todo.js')}}"></script>

        <script src="{{asset('public/backend/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/datatables/dataTables.bootstrap.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


         <!-- form -->
         <script type="text/javascript" src="{{asset('public/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>

        <!--form validation init-->
        <script src="{{asset('public/backend/assets/summernote/summernote.min.js')}}"></script>
        {{-- <script src="{{asset('public/backend/assets/tagsinput/jquery.tagsinput.min.js')}}"></script> --}}


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

        <script>

            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

            });
        </script>


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
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

<script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>


	</body>
</html>
