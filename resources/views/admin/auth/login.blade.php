<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('public/backend/images/favicon_1.ico')}}">

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
        <script src="{{asset('public/backend/js/modernizr.min.js')}}"></script>

    </head>



    <body >

    <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In <strong>Admin</strong> </h3>
                </div>


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{route('store.admin.login.info')}}">
                    @csrf

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('email') is-invalid @enderror" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('password') is-invalid @enderror" type="password" required="" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>





                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            {{-- {{ route('admin.password.reset') }} --}}
                            <a href="#"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>

                    </div>


                </form>
                </div>

            </div>
        </div>



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

