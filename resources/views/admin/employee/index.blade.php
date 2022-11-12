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
            <h4 class="breadcrumb-title">Employee</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Employee List</li>
            </ul>

            <div class="text-right card-courses-dec">

                <a href="{{url('admin/employee-create')}}" class="btn green radius-xl outline">Add Employee</a>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                    <div class="panel-body p-0">
                        <div class="card">
                            <form class="row clearfix filter-form">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name Search" class="form-control" >

                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Contact Name</label>
                                    <input type="text" name="contact_name" placeholder="Contact Name Search" class="form-control" >

                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select an Option</option>

                                        <option {{isset($_GET['status']) && $_GET['status']== 'active'?'selected':''}}  value="active">Active</option>
                                        <option {{isset($_GET['status']) && $_GET['status']== 'inactive'?'selected':''}}  value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <button class="btn btn-primary mt-2">Search</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Contact Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
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
                                                <span class="ttr-user-avatar"><img alt="" src="{{url($row->employeeDetails->photo??'')}}" onerror="this.src='/assets/images/no-image.png';"></span>
                                            </td>
                                            <td>
                                                {{$row->name??''}} {{$row->last_name??''}}
                                            </td>
                                            <td>
                                                {{$row->employeeContact->contact_name??'N/A'}}
                                            </td>
                                            <td>
                                                {{$row->email??''}}
                                            </td>
                                            <td>
                                                {{ucfirst($row->status??'')}}
                                            </td>
                                            <td>
                                                <div class="action-btns">

                                                    <a href="{{url('admin/employee/'.$row->id.'/show')}}" class="btn green radius-xl outline"><i class="fa fa-eye"></i></a>

                                                    <a href="{{url('admin/employee/'.$row->id.'/edit')}}" class="btn green radius-xl outline"><i class="fa fa-pencil"></i></a>

                                                        {!! Form::open([
                                                                        'method'=>'DELETE',
                                                                        'url' => ['/admin/employee/'.$row->id.'/delete',],
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
                                                <td class="text-center" colspan="7"> <strong>Sorry!</strong> No record found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="pull-right">
                                    {!! $records->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
