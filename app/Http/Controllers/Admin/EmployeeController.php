<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeContact;
use App\Models\EmployeeDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $records = User::whereHas('roles',function($q) use($request){
            $q->where('name','user');
            if(isset($request->status)){
                $q->where('status',$request->status);
            }
            if(isset($request->name)){

                $q->where('name', 'LIKE', '%' . $request->q . '%');
                $q->orWhere('last_name', 'LIKE', '%' . $request->q . '%');

        }
            // if(isset($request->contact_name)){
            //     $q->where('status',$request->status);
            // }
        })->get();



       return view('admin.employee.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $this->validate($request,[
            'name'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],

        ]);


        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name??null;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->source = 'regular';
        $user->save();
        $user->syncRoles('user');

        if($user){

            if(!empty($request->date_of_birth)){
                $dateOfBirth = date('Y-m-d',strtotime($request->date_of_birth));
            }else{
                $dateOfBirth = null;
            }

            $employeeDetails = new EmployeeDetail();
            $employeeDetails->employee_id = $user->id;
            $employeeDetails->date_of_birth = $dateOfBirth;
            $employeeDetails->gender = $request->gender??null;
            $employeeDetails->marital_status = $request->marital_status??null;
            $employeeDetails->blood_group = $request->blood_group??null;
            $employeeDetails->permanent_address = $request->permanent_address??null;
            $employeeDetails->current_address = $request->current_address??null;
            $employeeDetails->department = $request->department??null;
            $employeeDetails->designation = $request->designation??null;
            $employeeDetails->salary = $request->salary??null;

            if ($request->hasFile('photo')) {

                $image      = $request->file('photo');
                $imageName  = 'employee_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
                $path       = 'assets/images/profile/';
                $image->move($path, $imageName);
                $imageUrl   = $path . $imageName;
                $employeeDetails->photo = $imageUrl ;
            }

            $employeeDetails->save();

            $employeeContact = new EmployeeContact();

            $employeeContact->employee_id = $user->id;
            $employeeContact->contact_name = $request->contact_name??null;
            $employeeContact->contact_email = $request->contact_email??null;
            $employeeContact->contact_phone = $request->contact_phone??null;
            $employeeContact->contact_address = $request->contact_address??null;
            $employeeContact->save();


        }


        return redirect('/admin/employees')->withSuccess('Employee Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = User::where('id',$id)->first();
        return view('admin.employee.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = User::find($id);

        return view('admin.employee.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //  return $request;

         $this->validate($request,[
            'name'=> ['required', 'string', 'max:255'],

        ]);


        $user =  User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name??null;
        $user->status = $request->status;
        $user->save();

        $employeeDetails = EmployeeDetail::where('employee_id',$id)->first();
        $getEmployeeContact = EmployeeContact::where('employee_id',$id)->first();


        if(!$employeeDetails){

            if(!empty($request->date_of_birth)){
                $dateOfBirth = date('Y-m-d',strtotime($request->date_of_birth));
            }else{
                $dateOfBirth = null;
            }

            $employeeDetailCreate = new EmployeeDetail();
            $employeeDetailCreate->employee_id = $user->id;
            $employeeDetailCreate->date_of_birth = $dateOfBirth;
            $employeeDetailCreate->gender = $request->gender??null;
            $employeeDetailCreate->marital_status = $request->marital_status??null;
            $employeeDetailCreate->blood_group = $request->blood_group??null;
            $employeeDetailCreate->permanent_address = $request->permanent_address??null;
            $employeeDetailCreate->current_address = $request->current_address??null;
            $employeeDetailCreate->department = $request->department??null;
            $employeeDetailCreate->designation = $request->designation??null;
            $employeeDetailCreate->salary = $request->salary??null;

            if ($request->hasFile('photo')) {

                $image      = $request->file('photo');
                $imageName  = 'employee_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
                $path       = 'assets/images/profile/';
                $image->move($path, $imageName);
                $imageUrl   = $path . $imageName;
                $employeeDetailCreate->photo = $imageUrl ;
            }

            $employeeDetailCreate->save();

            $employeeContact = new EmployeeContact();

            $employeeContact->employee_id = $user->id;
            $employeeContact->contact_name = $request->contact_name??null;
            $employeeContact->contact_email = $request->contact_email??null;
            $employeeContact->contact_phone = $request->contact_phone??null;
            $employeeContact->contact_address = $request->contact_address??null;
            $employeeContact->save();


        }

        if($employeeDetails){

            if(!empty($request->date_of_birth)){
                $dateOfBirth = date('Y-m-d',strtotime($request->date_of_birth));
            }else{
                $dateOfBirth = null;
            }

            $employeeDetailsUpdate =  EmployeeDetail::find($employeeDetails->id);
            // $employeeDetailsUpdate->employee_id = $user->id;
            $employeeDetailsUpdate->date_of_birth = $dateOfBirth;
            $employeeDetailsUpdate->gender = $request->gender??null;
            $employeeDetailsUpdate->marital_status = $request->marital_status??null;
            $employeeDetailsUpdate->blood_group = $request->blood_group??null;
            $employeeDetailsUpdate->permanent_address = $request->permanent_address??null;
            $employeeDetailsUpdate->current_address = $request->current_address??null;
            $employeeDetailsUpdate->department = $request->department??null;
            $employeeDetailsUpdate->designation = $request->designation??null;
            $employeeDetailsUpdate->salary = $request->salary??null;

            if ($request->hasFile('photo')) {

                $image      = $request->file('photo');
                $imageName  = 'employee_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
                $path       = 'assets/images/profile/';
                $image->move($path, $imageName);
                $imageUrl   = $path . $imageName;
                $employeeDetailsUpdate->photo = $imageUrl ;
            }

            $employeeDetailsUpdate->save();

            $employeeContactUpdate =  EmployeeContact::find($getEmployeeContact->id);

            // $employeeContactUpdate->employee_id = $user->id;
            $employeeContactUpdate->contact_name = $request->contact_name??null;
            $employeeContactUpdate->contact_email = $request->contact_email??null;
            $employeeContactUpdate->contact_phone = $request->contact_phone??null;
            $employeeContactUpdate->contact_address = $request->contact_address??null;
            $employeeContactUpdate->save();


        }


        return redirect('/admin/employees')->withSuccess('Employee Update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $getIdDetail = EmployeeDetail::where('employee_id',$id)->first();
        $getIdContact = EmployeeContact::where('employee_id',$id)->first();

        User::destroy($id);
        if($getIdDetail){
            EmployeeDetail::destroy($getIdDetail->id);

        }
        if($getIdContact){
            EmployeeContact::destroy($getIdContact->id);

        }


        return back()->withSuccess('Employee Delete Successfully!');
    }
}
