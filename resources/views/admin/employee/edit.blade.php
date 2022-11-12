@extends('layouts.admin')

@section('content')
	<!-- Left sidebar menu end -->

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
					<li><a href="/admin/dashboard"><i class="fa fa-home"></i>Home</a></li>
					<li>Employee Edit</li>
				</ul>
			</div>
			<!-- Main section -->
            <div class="container">


                <form action="{{url('admin/employee/'.$row->id.'/update')}}" id="form" accept-charset="UTF-8"
                    enctype="multipart/form-data" method="POST">
                      {{csrf_field()}}
                      {{method_field('PATCH')}}
                    <div class="row clearfix db-breadcrumb">
                        <div class="col-md-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                   <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Personal Information</Span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    First Name <span style="color: red">*</span>
                                </label>
                                <input type="text" value="{{$row->name??''}}" class="form-control" placeholder="First Name" name="name"  required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Last Name
                                </label>
                                <input type="text" value="{{$row->last_name??''}}" class="form-control" placeholder="Last Name" name="last_name">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Email <span style="color: red">*</span>
                                </label>
                                <input type="email" value="{{$row->email??''}}"  placeholder="Email" class="form-control" readonly>
                            </div>
                        </div>

                         {{-- <div class="col-md-6">
                            <div class="form-group single-profile">
                                    <label>
                                         Password <span style="color: red">*</span>
                                    </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}




                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="room" >Status<span style="color: red">*</span></label>
                                <select  data-live-search="true"  name="status" id="status_id" class="form-control"  required>
                                    <option value="active" {{$row->status=='active'?'selected':''}}>{{__('Active')}}</option>
                                    <option value="inactive" {{$row->status=='inactive'?'selected':''}}>{{__('Inactive')}}</option>
                                </select>
                            </div>
                        </div>



                        {{-- <div class="col-md-12">
                            <button data-loading-text="Processing..."
                                    class="feedback-btn btn green radius-xl outline" type="submit">Save
                            </button>
                        </div> --}}
                    </div>

                    <div class="row clearfix db-breadcrumb">
                        <div class="col-md-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                   <span style="color:#85f56e; font-size:20px;">|</span> <Span style="color:#5de342;"> Employee Details</Span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Upload Avatar
                                </label>
                                <input type="file" class="form-control" placeholder="Photo" name="photo">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Current Adress
                                </label>
                                <input type="text" value="{{$row->employeeDetails->current_address??''}}" class="form-control" placeholder=" Current Adress" name="current_address">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Permanent Adress
                                </label>
                                <input type="text" value="{{$row->employeeDetails->permanent_address??''}}" class="form-control" placeholder="Permanent Adress" name="permanent_address">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Bloode Group
                                </label>
                                <input type="text" value="{{$row->employeeDetails->blood_group??''}}" class="form-control" placeholder=" Bloode Group" name="blood_group">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="room" >Gender</label>
                                <select  data-live-search="true"  name="gender" id="gender" class="form-control" >
                                    <option value="">{{__('Select An Option')}}</option>
                                    <option value="male" {{$row->employeeDetails->gender??''=='male'?'selected':''}}>{{__('Male')}}</option>
                                    <option value="female" {{$row->employeeDetails->gender??''=='female'?'selected':''}}>{{__('Female')}}</option>
                                    <option value="others" {{$row->employeeDetails->gender??""=='others'?'selected':''}}>{{__('Others')}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="room" >Marital Status</label>
                                <select  data-live-search="true"  name="marital_status" id="marital_status" class="form-control" >
                                    <option value="">{{__('Select An Option')}}</option>
                                    <option value="unmarried" {{$row->employeeDetails->marital_status??''=='unmarried'?'selected':''}}>{{__('Unmarried')}}</option>
                                    <option value="married" {{$row->employeeDetails->marital_status??''=='married'?'selected':''}}>{{__('Married')}}</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Date Of Birth
                                </label>
                                <input type="text" value="{{$row->employeeDetails->date_of_birth??''}}" class="form-control datepicker" placeholder="Select Date Of Birth" name="date_of_birth">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Department
                                </label>
                                <input type="text" value="{{$row->employeeDetails->department??''}}" name="department" placeholder="department" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Designation
                                </label>
                                <input type="text" value="{{$row->employeeDetails->designation??''}}" name="designation" placeholder="designation" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Salary
                                </label>
                                <input type="number" value="{{$row->employeeDetails->salary??''}}" name="salary" placeholder="salary" class="form-control" >
                            </div>
                        </div>


                        {{-- <div class="col-md-12">
                            <button data-loading-text="Processing..."
                                    class="feedback-btn btn green radius-xl outline" type="submit">Save
                            </button>
                        </div> --}}
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                   <span style="color:#85f56e; font-size:20px;">|</span> <Span style="color:#5de342;"> Employee Contact Info</Span>
                                </li>
                            </ul>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Contact Full Name
                                </label>
                                <input type="text" value="{{$row->employeeContact->contact_name??''}}" class="form-control" placeholder="Contact Full Name" name="contact_name">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Contact Email
                                </label>
                                <input type="email" value="{{$row->employeeContact->contact_email??''}}" class="form-control" placeholder=" Contact Email" name="contact_email">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Contact Phone
                                </label>
                                <input type="text" value="{{$row->employeeContact->contact_phone??''}}" class="form-control" placeholder="Contact Phone" name="contact_phone">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group single-profile">
                                <label for="">
                                    Contact Address
                                </label>
                                <input type="text"  value="{{$row->employeeContact->contact_address??''}}" class="form-control" placeholder="Contact Address" name="contact_address">

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button data-loading-text="Processing..."
                                    class="feedback-btn btn green radius-xl outline" type="submit">Save
                            </button>
                        </div>
                        <br><br><br>
                    </div>
                </form>

            </div>
		</div>
	</main>
 @endsection

@section('script')

@endsection
