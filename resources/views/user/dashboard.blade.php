@extends('layouts.user')
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
                            January Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_jan??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            February Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_feb??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            March Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_mar??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            April Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_appr??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            May Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_may??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            June Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_jun??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            July Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{($total_work_duration_july??0)}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            August Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{$total_work_duration_aug}} </span>
                        </span>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            September Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{$total_work_duration_sep}} </span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            October Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{$total_work_duration_oct}} </span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            November Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{$total_work_duration_nov}} </span>
                        </span>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-card widget-bg1">
                    <div class="wc-item">
                        <h4 class="wc-title">
                            December Working Duration
                        </h4>

                        <span class="">
                            <span class="">{{$total_work_duration_dec}} </span>
                        </span>

                    </div>
                </div>
            </div>



        </div>

        <!-- Card END -->

    </div>
</main>
@endsection

@section('script')

<script>

</script>

@endsection
