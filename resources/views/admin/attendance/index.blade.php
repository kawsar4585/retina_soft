@extends('layouts.admin')
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

            <div class="text-right card-courses-dec">

                <a href="{{url('admin/attendance-create')}}" class="btn green radius-xl outline">Add Attendance</a>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                    <div class="panel-body p-0">
                        <div class="card">

                                <div class="col-md-3">

                                </div>


                            <div class="table-responsive">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Employee</th>

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
                                                {{ $row->employee->name??'N/A'}}

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
                                                <span style="bg-info">Working...</span>

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

                                                    <a href="#UpdateModal{{$row->id}}" data-toggle="modal" class="btn green radius-xl outline"><i class="fa fa-pencil"></i></a>

                                                    <div class="modal fade" id="UpdateModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                <h4>Update Attendance</h4>
                                                                <form class="" method="POST" action="{{url('admin/attendance/'.$row->id.'/edit')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                                    {{csrf_field()}}

                                                                    <div class="row book-input-row">

                                                                        <div class="col-12 col">
                                                                            <div class="lesson-input">
                                                                                <label for="status">Clock In Time</label>
                                                                                <input type="text" class="form-control datetimepicker" value="{{date('d-m-Y H:i',strtotime($row->clock_in_time))}}" placeholder="Clock In Time" name="clock_in_time" required>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col">
                                                                            <div class="lesson-input">
                                                                                <label for="status">Clock Out Time</label>
                                                                                <input type="text" class="form-control datetimepicker" value="{{date('d-m-Y H:i',strtotime($row->clock_out_time))}}" placeholder="Clock Out Time" name="clock_out_time" required>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row card-courses-dec">
                                                                        <div class="col-12 col">
                                                                           <button type="submit" class="clockOutBtn">Update</a>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        {!! Form::open([
                                                                        'method'=>'DELETE',
                                                                        'url' => ['/admin/attendance/'.$row->id.'/delete',],
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
