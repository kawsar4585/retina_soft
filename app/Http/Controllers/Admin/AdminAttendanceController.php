<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAttendanceController extends Controller
{

    public function index(Request $request){


        $records = Attendance::orderBy('id','DESC')->get();

        return view('admin.attendance.index',compact('records'));

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'clock_in_time'=> 'required',
            'clock_out_time' => 'required',
        ]);

        $attendance = Attendance::find($id);
        $attendance->clock_in_time = date('Y-m-d H:i',strtotime($request->clock_in_time));
        $attendance->clock_out_time = date('Y-m-d H:i',strtotime($request->clock_out_time));
        $attendance->save();
        return redirect('admin/attendance-lists')->with('success','Update Successfull !');



    }

    public function reports(Request $request){

        $records = Attendance::where(function ($q) use ($request) {

            $fromDate = date('Y-m-d',strtotime($request->from_date));
            $toDate = date('Y-m-d',strtotime($request->to_date));


            if (isset($request->from_date) && $request->from_date){
                $q->where(DB::raw('date(clock_in_time)'),'>=',$fromDate);
            }
            if (isset($request->to_date) && $request->to_date){
                $q->where(DB::raw('date(clock_in_time)'),'<=',$toDate);
            }
            if(isset($request->employee_name)  && $request->employee_name){
                $employee_name=User::where('name',$request->employee_name)->first();
                if($employee_name){
                    $q->where('employee_id',$employee_name->id);
                }

            }
        })
        ->orderBy('id','DESC')->get();

        $total_work_duration = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $query = Attendance::whereNotNull('clock_out_time')
            ->where(function ($q) use ($request) {

                $fromDate = date('Y-m-d',strtotime($request->from_date));
                $toDate = date('Y-m-d',strtotime($request->to_date));


                if (isset($request->from_date) && $request->from_date){
                    $q->where(DB::raw('date(clock_in_time)'),'>=',$fromDate);
                }
                if (isset($request->to_date) && $request->to_date){
                    $q->where(DB::raw('date(clock_in_time)'),'<=',$toDate);
                }
                if(isset($request->employee_name)  && $request->employee_name){
                    $employee_name=User::where('name',$request->employee_name)->first();
                    if($employee_name){
                        $q->where('employee_id',$employee_name->id);
                    }

                }
            });
            $minutes_sum = $query->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
            $total_work_duration = !empty($minutes_sum->total_minutes) ? $minutes_sum->total_minutes: 0;

            $hours = floor($total_work_duration / 60);
            $min = $total_work_duration - ($hours * 60);
            $total_work_duration = $hours.' hours '. $min.' minutes';

        }

        return view('admin.attendance.attendance-report',compact('records','total_work_duration'));
    }

    public function create(){


        $employess =User::whereHas('roles',function($q){
            $q->where('name','user');
        })->where('status','active')->get();

        return view('admin.attendance.create',compact('employess'));

    }

    public function store(Request $request){


        $this->validate($request,[
            'employee_id'=>'required',
            'clock_in_time'=> 'required',
            'clock_out_time' => 'required',
        ]);

        $clockInTimeFormate = date('Y-m-d H:i:00',strtotime($request->clock_in_time));
        $clockOutTimeFormate = date('Y-m-d H:i',strtotime($request->clock_out_time));

        $checkDate = date('Y-m-d',strtotime($request->clock_in_time));
        $check = Attendance::where('employee_id',$request->employee_id)->whereDate('clock_in_time',$checkDate)->first();
        if($check){
            return back()->withErrors('Your Check In date Already Exist');
        }

        // return 'asdf';

        $ipAddress = $this->ipAddress();
        // return $ipAddress;

        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id;
        $attendance->clock_in_time = $clockInTimeFormate ;
        $attendance->clock_out_time = $clockOutTimeFormate;
        $attendance->clock_in_note = $request->clock_in_note;
        $attendance->clock_out_note = $request->clock_out_note;
        $attendance->ip_address = $ipAddress;

        $attendance->added_by = Auth::id();
        $attendance->save();

        return redirect('/admin/attendance-lists')->with('success','Attendence Added Successfull !');


    }

    public function destroy($id){

        Attendance::destroy($id);
        return back()->with('success','attendance Delele success');

    }

    public function ipAddress(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }



}
