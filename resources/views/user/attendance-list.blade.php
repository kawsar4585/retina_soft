@extends('layouts.user')
@section('style')
    <style>
        .clockOutBtn {
        padding: 10px !important;
        border: 0;
        font-size: 14px;
        background-color: #f7b205 !important;
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
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Attendance List</li>
            </ul>

            {{-- <div class="text-right card-courses-dec">

                <a href="{{url('user/attendance-create')}}" class="btn green radius-xl outline">Add Attendance</a>

            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                    <div class="panel-body p-0">
                        <div class="card">

                                <div class="col-md-3">
                                    @if(!$checkTodayClockIn)
                                    <a href="{{url('user/attendance/clock-in-time')}}" class="btn btn-primary mb-2"><i class="fa fa-clock"></i> Clock In Time</a>
                                    @else
                                    <a href="#" class="btn btn-primary mb-2"><i class="fa fa-clock"></i> Today Clock In Added</a>
                                    @endif
                                </div>


                            <div class="table-responsive">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Date</th>
                                            <th>Clock In Time</th>
                                            <th>Clock Out Time</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($records??array() as $row)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>

                                            <td>
                                                {{ date('d F Y', strtotime($row->clock_in_time??'N/A')) }}

                                            </td>
                                            <td>
                                                {{ date('d-m-Y H:i A', strtotime($row->clock_in_time)) }}

                                            </td>
                                            <td>
                                                @if($row->clock_out_time != null &&  $row->clock_out_time !='')
                                                {{ date('d-m-Y H:i A', strtotime($row->clock_out_time)) }}

                                                @else
                                                <a href="{{url('user/attendance/clock-out-time/'.$row->id)}}" class="clockOutBtn"><i class="fa fa-clock"></i> Clock Out Time</a>
                                                @endif


                                            </td>
                                            <td>
                                                @if($row->clock_in_time != null &&  $row->clock_out_time ==null)
                                                <span style="bg-info">Working...</span>

                                                @else

                                                @php
                                                    $clock_in_time = \Carbon\Carbon::createFromTimeStamp(strtotime($row->clock_in_time));
                                                    $diffHours = $clock_in_time ->diff($row->clock_out_time)->format('%h hours and %i minutes');

                                                @endphp
                                                {{$diffHours}}

                                                @endif

                                            </td>
                                            <td>
                                                <div class="action-btns">

                                                    {{-- <a href="{{url('user/attendance/'.$row->id.'/edit')}}" class="btn green radius-xl outline"><i class="fa fa-pencil"></i></a> --}}

                                                        {!! Form::open([
                                                                        'method'=>'DELETE',
                                                                        'url' => ['/user/attendance/'.$row->id.'/delete',],
                                                                        'style' => 'display:inline'
                                                                        ]) !!}
                                                        {!! Form::button('<i class="fas fa-trash-alt"></i>', array(

                                                            'type' => 'submit',
                                                            'onclick' => 'return confirm("Are you sure? ");',
                                                            'class' => 'btn green radius-xl outline',
                                                                'data-type'=>'confirm',
                                                            )) !!}
                                                        {!! Form::close() !!}

                                                </div>
                                            </td>

                                        </tr>

                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="5"> <strong>Sorry!</strong> No record found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="pull-right">
                                    {{ $records->links() }}

                                </div> --}}
                            </div>
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
