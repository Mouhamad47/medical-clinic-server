<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    // 'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);

    Route::get('getmajors',[MajorController::class,'getMajors']);
    Route::get('getlasttwomajors',[MajorController::class,'lastTwo']);

    Route::get('getalldoctors',[UserController::class, 'getAllDoctors']);
    Route::get('getallnurses',[UserController::class, 'getAllNurses']);

    Route::get('getjobapp',[JobApplicationController::class , 'getJobApp']);
    Route::post('createjobapp',[JobApplicationController::class,'create']);
    Route::delete('declinejobapp/{id}',[JobApplicationController::class,'decline']);

    Route::get('getappointments',[AppointmentController::class, 'getAppointments']);
    Route::post('createappointment',[AppointmentController::class,'create']);
    Route::put('approveappointment/{id}',[AppointmentController::class,'approve']);
    Route::get('deleteappointment/{id}',[AppointmentController::class,'delete']);

    Route::get('getschedules',[ScheduleController::class,'getSchedules']);
    Route::post('createschedule',[ScheduleController::class,'create']);
    Route::post('updateschedule',[ScheduleController::class, 'update']);

    Route::get('getconsultations',[ConsultationController::class,'getConsultations']);
    Route::post('createconsultation',[ConsultationController::class,'createConsultation']);
    Route::put('approveconsultation/{id}',[ConsultationController::class,'approveConsultation']);

    Route::get('userinfo',[UserController::class,'getUserInfo']);

    

  

    //edit profile
    // Route::post('updateprofile',[User::class, 'updateProfile']);
    






});


