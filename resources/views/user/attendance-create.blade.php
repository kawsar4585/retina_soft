@extends('layouts.user')
@section('style')
    <style>
       /* .db-breadcrumb{
        border-bottom: 2px solid #4bf20f !important;
       } */

       ::placeholder {
        color: #4bf20f !important;
        opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #4bf20f !important;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
        color: #4bf20f !important;
        }

    </style>
@endsection
@section('content')

<main class="ttr-wrapper">
    <div class="container-fluid">

        @if(session()->has('success'))
                 <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Attendance</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="/user/dashboard"><i class="fa fa-home"></i>Home</a></li>
                <li>Attendance Create</li>
            </ul>
        </div>
        <!-- Main section -->

        <div class="container">


            <form action="{{url('user/attendance-store')}}" id="form" accept-charset="UTF-8"
              enctype="multipart/form-data" method="POST">
                {{csrf_field()}}

                <div class="row clearfix db-breadcrumb">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                               <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Attendance Push</Span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group single-profile">
                            <label for="">
                                Clock In Time <span style="color: red"></span>
                            </label>
                            <input type="text" class="form-control datetimepicker" placeholder="Clock In Time" name="clock_in_time" required>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group single-profile">
                            <label for="">
                                Clock Out Time <span style="color: red"></span>
                            </label>
                            <input type="text" class="form-control datetimepicker" placeholder="Clock Out Time" name="clock_out_time" >

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group single-profile">
                            <label for="">
                                Clock In Note <span style="color: red"></span>
                            </label>
                            <input type="text" class="form-control " placeholder="Clock In Note" name="clock_in_note" >

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group single-profile">
                            <label for="">
                                Clock Out Note <span style="color: red"></span>
                            </label>
                            <input type="text" class="form-control " placeholder="Clock Out Note" name="clock_out_note" >

                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button data-loading-text="Processing..."
                                class="feedback-btn btn green radius-xl outline" type="submit">Save
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>
</main>
@endsection

@section('script')

<script>

</script>

@endsection
