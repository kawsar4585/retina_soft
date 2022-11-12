<?php

use App\Http\Controllers\Admin\AdminAttendanceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\AttendanceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});


Auth::routes(['verify' => true]);


Route::get('/home', function (){
    return redirect('user/dashboard');
})->name('home');


Route::get('/google', [LoginController::class,'redirectToProvider']);
Route::get('/google/callback', [LoginController::class,'handleProviderCallback']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//For auth and user
Route::group(['middleware' => ['auth','role:user','verified'], 'prefix' => 'user'], function () {
    Route::get('dashboard', [DashboardController::class,'userDashboard'])->name('userDashboard');
    Route::get('attendance-lists', [AttendanceController::class,'index'])->name('index');
    Route::get('attendance-create', [AttendanceController::class,'create'])->name('create');
    Route::post('attendance-store', [AttendanceController::class,'store'])->name('store');
    Route::delete('attendance/{id}/delete', [AttendanceController::class,'destroy']);

    Route::get('attendance/clock-in-time', [AttendanceController::class,'realClockInTime'])->name('realClockInTime');
    Route::get('attendance/clock-out-time/{id}', [AttendanceController::class,'realClockOutTime'])->name('realClockOutTime');
    Route::get('attendance-reports', [AttendanceController::class,'reports'])->name('reports');



});

//For Admin
Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class,'adminDashboard'])->name('adminDashboard');
    Route::get('employees', [EmployeeController::class,'index']);
    Route::get('employee-create', [EmployeeController::class,'create']);
    Route::post('employee-store', [EmployeeController::class,'store']);
    Route::get('employee/{id}/edit', [EmployeeController::class,'edit']);
    Route::patch('employee/{id}/update', [EmployeeController::class,'update']);
    Route::delete('employee/{id}/delete', [EmployeeController::class,'destroy']);
    Route::get('employee/{id}/show', [EmployeeController::class,'show']);

    Route::get('attendance-lists', [AdminAttendanceController::class,'index'])->name('index');
    Route::get('attendance-create', [AdminAttendanceController::class,'create'])->name('create');
    Route::post('attendance-store', [AdminAttendanceController::class,'store'])->name('store');
    Route::post('attendance/{id}/edit', [AdminAttendanceController::class,'update']);
    Route::get('attendance-reports', [AdminAttendanceController::class,'reports'])->name('index');
    Route::delete('attendance/{id}/delete', [AdminAttendanceController::class,'destroy']);






    // Route::resource('employees',[EmployeeController::class]);

});
