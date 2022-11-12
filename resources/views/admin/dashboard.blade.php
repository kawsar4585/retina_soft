@extends('layouts.admin')
{{-- @section('style')
    <style>
        a, .text-primary, .primary li::before, .menu-links .nav > li.active > a, .menu-links .nav > li:hover > a, .menu-links .nav > li .mega-menu > li ul a:hover, .menu-links .nav > li .sub-menu li:hover > a, footer a:active, footer a:focus, footer a:hover, footer h1 a, footer h2 a, footer h3 a, footer h4 a, footer h5 a, footer h6 a, footer p a, .testimonial-1 .testimonial-position, .acod-head a::after, .acod-head a, .acod-head a:hover, .acod-head a.collapsed:hover, .ttr-tabs .nav-tabs > li > a i, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .btn.outline, .btn-link:hover {
            color: #fff !important;
    }
    </style>
@endsection --}}
@section('content')

<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Dashboard</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>
        <!-- Card -->
        <div class="row">
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            Total Employess
                        </h4>
                        <span class="wc-des">

                        </span>
                        <span class="wc-stats">
                            <span class="counter">{{$totalEmployee??0}}</span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg2">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            Active Employess
                        </h4>

                        <span class="wc-stats">
                            <span class="counter">
                                {{$totalEmployeeActive??0}}
                            </span>
                        </span>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg3">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            Inactive Employess
                        </h4>

                        <span class="wc-stats">
                            <span class="counter">
                                {{$totalEmployeeInactive??0}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget-card widget-bg3">
                <div class="wc-item">
                    <h4 class="wc-title">
                        Google Login Employee
                    </h4>

                    <span class="wc-stats">
                        <span class="counter">
                            {{$totalEmployeeGoogleLogin??0}}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>


</div>


    </div>
</main>
@endsection

@section('script')

<script>

</script>

@endsection
