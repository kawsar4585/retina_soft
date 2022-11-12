<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminDashboard(){

        $totalEmployee = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->count();

        $totalEmployeeActive = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->where('status','active')
        ->count();

        $totalEmployeeInactive = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->where('status','inactive')
        ->count();

        $totalEmployeeGoogleLogin = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->where('source','google')
        ->count();



        return view('admin.dashboard',compact('totalEmployee','totalEmployeeActive','totalEmployeeInactive','totalEmployeeGoogleLogin'));

    }

    public function userDashboard(Request $request){

        $from_dateJan = date('2022-01-01');
        $to_dateJan = date('2022-01-t');
        $total_work_duration_jan = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryJan = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateJan)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateJan);
            $minutes_sumJan = $queryJan->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_jan = !empty($minutes_sumJan->total_minutes) ? $minutes_sumJan->total_minutes  : 0;

              $hours_jan = floor($total_work_duration_jan / 60);
              $min_jan   = $total_work_duration_jan - ($hours_jan   * 60);
              $total_work_duration_jan  = $hours_jan   .' hours '. $min_jan   .' minutes';
        }

        $from_dateFeb = date('2022-02-01');
        $to_dateFeb = date('2022-02-t');
        $total_work_duration_feb = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryFeb = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateFeb)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateFeb);
            $minutes_sumFeb = $queryFeb->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_feb = !empty($minutes_sumFeb->total_minutes) ? $minutes_sumFeb->total_minutes : 0;

              $hours_feb = floor($total_work_duration_feb / 60);
              $min_feb   = $total_work_duration_feb - ($hours_feb   * 60);
              $total_work_duration_feb  = $hours_feb   .' hours '. $min_feb   .' minutes';
        }

        $from_dateMar = date('2022-03-01');
        $to_dateMar = date('2022-03-t');
        $total_work_duration_mar = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $querymMar = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateMar)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateMar);
            $minutes_sumMar = $querymMar->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_mar = !empty($minutes_sumMar->total_minutes) ? $minutes_sumMar->total_minutes : 0;

              $hours_mar  = floor($total_work_duration_mar / 60);
              $min_mar   = $total_work_duration_mar - ($hours_mar   * 60);
              $total_work_duration_mar  = $hours_mar   .' hours '. $min_mar   .' minutes';
        }

        $from_dateAppr = date('2022-04-01');
        $to_dateAppr = date('2022-m=04-t');
        $total_work_duration_appr = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryAppr = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateAppr)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateAppr);
            $minutes_sumAppr = $queryAppr->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
            $total_work_duration_appr = !empty($minutes_sumAppr->total_minutes) ? $minutes_sumAppr->total_minutes : 0;

            $hours_appr  = floor($total_work_duration_appr / 60);
            $min_appr   = $total_work_duration_appr - ($hours_appr  * 60);
            $total_work_duration_appr = $hours_appr  .' hours '. $min_appr  .' minutes';
        }

        $from_dateMay = date('2022-05-01');
        $to_dateMay = date('2022-05-t');
        $total_work_duration_may = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryMay = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateMay)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateMay);
            $minutes_sumMay = $queryMay->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_may = !empty($minutes_sumMay->total_minutes) ? $minutes_sumMay->total_minutes  : 0;

              $hours_may = floor($total_work_duration_may / 60);
              $min_may  = $total_work_duration_may - ($hours_may * 60);
              $total_work_duration_may = $hours_may .' hours '. $min_may .' minutes';
        }

        $from_dateJun = date('2022-06-01');
        $to_dateJun = date('2022-06-t');
        $total_work_duration_jun = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryJun = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateJun)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateJun);
            $minutes_sumJun = $queryJun->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_jun = !empty($minutes_sumJun->total_minutes) ? $minutes_sumJun->total_minutes  : 0;

              $hours_jun = floor($total_work_duration_jun / 60);
              $min_jun  = $total_work_duration_jun - ($hours_jun * 60);
              $total_work_duration_jun = $hours_jun .' hours '. $min_jun .' minutes';
        }

        $from_dateJuly = date('2022-07-01');
        $to_dateJuly = date('2022-07-t');
        $total_work_duration_july = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryJuly = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateJuly)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateJuly);
            $minutes_sumJuly = $queryJuly->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_july = !empty($minutes_sumJuly->total_minutes) ? $minutes_sumJuly->total_minutes  : 0;

              $hours_july = floor($total_work_duration_july / 60);
              $min_july  = $total_work_duration_july - ($hours_july * 60);
              $total_work_duration_july = $hours_july .' hours '. $min_july .' minutes';
        }

        $from_dateAug = date('2022-08-01');
        $to_dateAug = date('2022-08-t');
        $total_work_duration_aug = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryAug = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateAug)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateAug);
            $minutes_sumAug = $queryAug->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_aug = !empty($minutes_sumAug->total_minutes) ? $minutes_sumAug->total_minutes  : 0;

              $hours_aug = floor($total_work_duration_aug / 60);
              $min_aug  = $total_work_duration_aug - ($hours_aug * 60);
              $total_work_duration_aug = $hours_aug .' hours '. $min_aug .' minutes';
        }

        $from_dateSep = date('2022-09-01');
        $to_dateSep = date('2022-09-t');
        $total_work_duration_sep = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $querySep = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateSep)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateSep);
            $minutes_sumSep = $querySep->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_sep = !empty($minutes_sumSep->total_minutes) ? $minutes_sumSep->total_minutes  : 0;

              $hours_sep = floor($total_work_duration_sep / 60);
              $min_sep  = $total_work_duration_sep - ($hours_sep  * 60);
              $total_work_duration_sep = $hours_sep .' hours '. $min_sep .' minutes';
        }
        

        $from_dateOct = date('2022-10-01');
        $to_dateOct = date('2022-10-t');
        $total_work_duration_oct = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryOct = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateOct)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateOct);
            $minutes_sumOct = $queryOct->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_oct = !empty($minutes_sumOct->total_minutes) ? $minutes_sumOct->total_minutes : 0;

              $hours_oct = floor($total_work_duration_oct / 60);
              $min_oct  = $total_work_duration_oct - ($hours_oct  * 60);
              $total_work_duration_oct = $hours_oct .' hours '. $min_oct .' minutes';
        }

        $from_dateNov = date('2022-11-01');
        $to_dateNov = date('2022-11-t');
        $total_work_duration_nov = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryNov = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateNov)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateNov);
            $minutes_sumNov = $queryNov->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
              $total_work_duration_nov = !empty($minutes_sumNov->total_minutes) ? $minutes_sumNov->total_minutes : 0;
              $hours_nov= floor($total_work_duration_nov / 60);
              $min_nov = $total_work_duration_nov - ($hours_nov * 60);
              $total_work_duration_nov = $hours_nov.' hours '. $min_nov.' minutes';
        }

        $from_dateDec = date('2022-12-01');
        $to_dateDec  = date('2022-12-t');
        $total_work_duration_dec = 0;
        $unit = 'hour';
        if ($unit == 'hour') {
            $queryDec = Attendance::where('employee_id',Auth::id())
            ->whereNotNull('clock_out_time')
            ->where(DB::raw('date(clock_in_time)'),'>=',$from_dateDec)
            ->where(DB::raw('date(clock_in_time)'),'<=',$to_dateDec);
            $minutes_sumDec = $queryDec->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, clock_in_time, clock_out_time)) as total_minutes'))->first();
            $total_work_duration_dec = !empty($minutes_sumDec->total_minutes) ? $minutes_sumDec->total_minutes : 0;

            $hours_dec = floor($total_work_duration_dec / 60);
            $min_dec = $total_work_duration_dec - ($hours_dec * 60);
            $total_work_duration_dec = $hours_dec.' hours '. $min_dec.' minutes';

        }


        return view('user.dashboard',compact('total_work_duration_jan','total_work_duration_feb','total_work_duration_mar',
    'total_work_duration_appr','total_work_duration_may','total_work_duration_jun','total_work_duration_july','total_work_duration_aug','total_work_duration_sep','total_work_duration_oct','total_work_duration_nov','total_work_duration_dec'));
    }
}
