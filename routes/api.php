<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
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

    Route::get('getjobapp',[JobApplicationController::class , 'getJobApp']);
    Route::post('/createjobapp',[JobApplicationController::class,'create']);
    Route::delete('/declinejobapp/{id}',[JobApplicationController::class,'decline']);

    Route::get('getappointments',[AppointmentController::class, 'getAppointments']);
    Route::post('createappointment',[AppointmentController::class,'create']);
    Route::put('appointmentapproved/{id}',[AppointmentController::class,'update']);
    Route::delete('deleteappointment/{id}',[AppointmentController::class,'delete']);

    Route::get('getschedules',[ScheduleController::class,'getSchedules']);
    Route::post('createschedule',[ScheduleController::class,'create']);
    Route::post('updateschedule',[ScheduleController::class, 'update']);

    Route::get('getconsultations',[ConsultationController::class,'getConsultations']);
    Route::post('createconsultation',[ConsultationController::class,'createConsultation']);

    

    Route::get('getbeds',[BedController::class,'getBeds']);
    Route::post('createbed',[BedController::class,'createBed']);
    Route::delete('deletebed',[BedController::class,'deleteBed']);

    
    Route::get('getrooms',[RoomController::class,'getRooms']);
    Route::post('createroom',[RoomController::class,'createRoom']);
    Route::post('updateroom',[RoomController::class, 'updateRoom']);
    Route::delete('deleteroom/{id}',[RoomController::class,'deleteRoom']);

    //edit profile
    // Route::post('updateprofile',[User::class, 'updateProfile']);
    






});


