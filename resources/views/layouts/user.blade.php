<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>

  <!-- META ============================================= -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <meta name="robots" content="" />
<meta name="csrf-token" content="{{csrf_token()}}" />

  <!-- DESCRIPTION -->
  <meta name="description" content="Retina soft" />

  <!-- OG -->
  <meta property="og:title" content="Retina soft" />
  <meta property="og:description" content="Retina soft" />
  <meta property="og:image" content="" />
  <meta name="format-detection" content="telephone=no">

  <!-- FAVICONS ICON ============================================= -->
  <link rel="icon" href="..favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

  <!-- PAGE TITLE HERE ============================================= -->
  <title>Retina Soft</title>

  <!-- MOBILE SPECIFIC ============================================= -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if lt IE 9]>
  <script src="../assets/js/html5shiv.min.js"></script>
  <script src="../assets/js/respond.min.js"></script>
  <![endif]-->

  <!-- All PLUGINS CSS ============================================= -->
  <link rel="stylesheet" type="text/css" href="/assets/css/assets.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/nice-select.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/slick.css">
  <link rel="stylesheet" type="text/css" href="/assets/vendors/calendar/fullcalendar.css">

  <!-- TYPOGRAPHY ============================================= -->
  <link rel="stylesheet" type="text/css" href="/assets/css/typography.css">

  <!-- SHORTCODES ============================================= -->
  <link rel="stylesheet" type="text/css" href="/assets/css/shortcodes/shortcodes.css">

  <!-- STYLESHEETS ============================================= -->
  <link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">
  <link class="skin" rel="stylesheet" type="text/css" href="/assets/css/color/color-1.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/default.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
  <link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @yield('style')

  <style>
   .ttr-arrow-icon{
     height: unset !important;
   }
  </style>

</head>
<!-- head End -->
<body class="ttr-opened-sidebar ttr-pinned-sidebar admin-panel">
<!-- header start -->
<header class="ttr-header">
 <div class="ttr-header-wrapper">
  <!--sidebar menu toggler start -->
  <div class="ttr-toggle-sidebar ttr-material-button">
   <i class="ti-close ttr-open-icon"></i>
   <i class="ti-menu ttr-close-icon"></i>
  </div>
  <!--sidebar menu toggler end -->
  <!--logo start -->
  <div class="ttr-logo-box">
   <div>
     <a href="index.php" class="ttr-logo"></a>
   </div>
  </div>
  <!--logo end -->
  <div class="ttr-header-right ttr-with-seperator">
   <!-- header right menu start -->
   <ul class="ttr-header-navigation">

     <li>
        <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="" onerror="this.src='/assets/images/no-image.png';"></span>{{Auth::user()->name}}<span class="ti-angle-down"></span></a>
        <div class="ttr-header-submenu">
             <ul>

                     <li>
                                  <a href="#" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">Logout</a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                       @csrf
                                  </form>
                     </li>
             </ul>
        </div>
     </li>
   </ul>
   <!-- header right menu end -->
  </div>
 </div>
</header>
<!-- header end -->
<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
 <div class="ttr-sidebar-wrapper content-scroll">
  <!-- side menu logo start -->
  <div class="ttr-sidebar-logo">
   <a href="#"><img alt="" src="/assets/images/retina-logo.png" width="122" height="27"></a>
   <h4>{{Auth::user()->name}} {{Auth::user()->last_name??''}}</h4>
  </div>
  <!-- side menu logo end -->
  <!-- sidebar menu start -->
  <nav class="ttr-sidebar-navi">
   <ul>
     <li class="@if(Request::is('user/dashboard')) show active @endif">
        <a href="{{url('user/dashboard')}}" class="ttr-material-button">
             <span class="ttr-icon"><i class="ti-home"></i></span>
             <span class="ttr-label">Dashboard</span>
        </a>
     </li>

     {{-- <li class="">
        <a href="{{url('user/attendance-create')}}" class="ttr-material-button">
             <span class="ttr-icon"><i class="fa fa-male"></i></span>
             <span class="ttr-label">Add Attendance</span>
        </a>
     </li> --}}

     <li class="">
        <a href="{{url('user/attendance-lists')}}" class="ttr-material-button">
             <span class="ttr-icon"><i class="fa fa-clipboard-user"></i></span>
             <span class="ttr-label">Attendance List</span>
        </a>
     </li>

     <li class="">
        <a href="{{url('user/attendance-reports')}}" class="ttr-material-button">
             <span class="ttr-icon"><i class="fa fas fa-chart-bar"></i></span>
             <span class="ttr-label">Attendance Report</span>
        </a>
     </li>



     <li class="ttr-seperate"></li>

     <li class="">

        <a href="#" href="{{ route('logout') }}"
        onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
        </form>
     </li>
   </ul>
   <!-- sidebar menu end -->
  </nav>
  <!-- sidebar menu end -->
 </div>
</div>
<!-- Left sidebar menu end -->

 @yield('content')
 <div class="ttr-overlay"></div>


<!-- script section start-->
<!-- External JavaScripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/vendors/counter/waypoints-min.js"></script>
<script src="/assets/vendors/counter/counterup.min.js"></script>
<script src='/assets/vendors/scroll/scrollbar.min.js'></script>
<script src="/assets/vendors/chart/chart.min.js"></script>
<script src='/assets/vendors/calendar/moment.min.js'></script>
<script src='/assets/vendors/calendar/fullcalendar.min.js'></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.nice-select.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/owl.carousel.js"></script>
<script src="/assets/js/admin.js"></script>
<script src='/assets/js/main.js'></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/plugins/char-count/charcounter.js')}}"></script>


<script src="{{asset('assets/plugins/chartjs/knob.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/jquery-knob.js')}}"></script>


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">

    <!-- JS -->
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}" type="text/javascript"></script>



    <script>
        $(".description-limit").charCounter({
            backgroundColor: "#FFFFFF",
            position: {
                right: 10,
                top: 10
            },
            font:   {
                size: 10,
                color: "#a59c8c"
            },
            limit: 300
        });
    </script>

<script>

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
    $('.datepicker').bootstrapMaterialDatePicker({
            format: 'DD-MM-YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY HH:mm',
        clearButton: true,
        weekStart: 1,
        time: true
    });
</script>
 @yield('script')

 <script>

</script>

</body>
</html>
