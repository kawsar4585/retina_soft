@extends('layouts.admin')
@section('content')

	<!--Main container start -->
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
                        <li>Employee Show</li>
                    </ul>
                </div>
			<!-- Lesson  Details Table -->
			<div class="row clearfix">
				<div class="col-md-10 offset-md-1">
						<div class="panel-body p-0">
							<div class="card">
                                <div class="header">
                                    <h5 style="color:#0d248b;"><strong>Preview of </strong>{{$row->name??''}} {{$row->last_name??''}}</h5>
                                </div>
                                <div class="body">
                                    <div class="col-md-6 offset-md-3 text-center">
                                        <div class="upload-thumb"><img class="img" src="{{url($row->employeeDetails->photo??'')}}" alt="" onerror="this.src='/assets/images/no-image.png';">
                                        </div>
                                    </div>
								<div class="table-responsive white-space-normal-table">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                               <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Personal Information</Span>
                                            </li>
                                        </ul>
                                    </div>
									<table class="table table-striped mt-4">
										<tbody>
											<tr>
                                                <th>Name</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->name??''}} {{$row->last_name??''}}
                                                </td>
                                            </tr>
											<tr>
                                                <th>Email</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->email??''}}
                                                </td>
                                            </tr>
											<tr>
                                                <th>Status</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{ucfirst($row->status??'')}}
                                                </td>
                                            </tr>

										</tbody>
									</table>
                                </div>
                                <div class="table-responsive white-space-normal-table">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                               <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Employee Details</Span>
                                            </li>
                                        </ul>
                                    </div>
									<table class="table table-striped mt-4">
										<tbody>
											<tr>
                                                <th>Current Adress</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->current_address??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Permanent Adress</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->permanent_address??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Bloode Group</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->blood_group??'N/A'}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->gender??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th> Marital Status</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->marital_status??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>  Date Of Birth</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->date_of_birth??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>  Department</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->department??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>  Designation</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->designation??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>  Salary</th>
                                                <td style="width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeDetails->salary??'N/A'}}
                                                </td>
                                            </tr>


										</tbody>
									</table>
                                </div>

                                <div class="table-responsive white-space-normal-table">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                               <span style="color:#4bf20f; font-size:20px;">|</span> <Span style="color:#4bf20f;"> Contact Info</Span>
                                            </li>
                                        </ul>
                                    </div>
									<table class="table table-striped mt-4">
										<tbody>
											<tr>
                                                <th> Contact Full Name</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeContact->contact_name??'N/A'}}
                                                </td>
                                            </tr>
											<tr>
                                                <th>Contact Email</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeContact->contact_email??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Contact Phone</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeContact->contact_phone??'N/A'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Contact Addreess</th>
                                                <td style="color:#4bf20f;width:50% !important; min-width:50% !important; max-width: 50% !important; text-align: left;">
                                                    {{$row->employeeContact->contact_address??'N/A'}}
                                                </td>
                                            </tr>


										</tbody>
									</table>
                                </div>
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

@endsection
