@extends('layouts.admin')
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
                <li><a href="/admin/dashboard"><i class="fa fa-home"></i>Home</a></li>
                <li>Attendance Create</li>
            </ul>
        </div>
        <!-- Main section -->

        <div class="container">


            <form action="{{url('admin/attendance-store')}}" id="form" accept-charset="UTF-8"
              enctype="multipart/form-data" method="POST">
                {{csrf_field()}}

                <div class="row clearfix db-breadcrumb">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                               <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Attendance Add</Span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Employee</label>
                            <select name="employee_id" id="employee_id" data-live-search="true" class="form-control" required>
                                <option value="">Select Option</option>
                                @foreach ($employess as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                 @endforeach
                            </select>
                        </div>
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
