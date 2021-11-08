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
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\JobApplication;
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
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
    Route::get('getalluerexceptlogged/{id}', [UserController::class, 'selectAllUserExceptLogged']);

    Route::get('getmajors', [MajorController::class, 'getMajors']);
    Route::get('getlasttwomajors', [MajorController::class, 'lastTwo']);

    Route::get('getsections', [SectionController::class, 'getSections']);


    Route::get('getalldoctors', [UserController::class, 'getAllDoctors']);
    Route::get('getallnurses', [UserController::class, 'getAllNurses']);
    Route::delete('deletedoctor/{id}', [UserController::class, 'deleteDoctor']);
    Route::delete('deletenurse/{id}', [UserController::class, 'deleteNurse']);
    Route::get('getLoggedDoctor', [UserController::class, 'getAuthenticatedDoctor']);

    Route::get('getjobapp', [JobApplicationController::class, 'getJobApp']);
    Route::post('createjobapp', [JobApplicationController::class, 'create']);
    Route::get('declinejobapp/{id}', [JobApplicationController::class, 'decline']);
    Route::get('numberofcandidates', [JobApplicationController::class, 'getNumberOfCandidates']);

    Route::get('getappointments', [AppointmentController::class, 'getAppointments']);
    Route::get('getapprovedappointments', [AppointmentController::class, 'getApprovedAppointments']);
    Route::get('getdeclinedappointments', [AppointmentController::class, 'getDeclinedAppointments']);
    Route::post('createappointment', [AppointmentController::class, 'createAppointment']);
    Route::put('approveappointment/{id}', [AppointmentController::class, 'approve']);
    Route::get('deleteappointment/{id}', [AppointmentController::class, 'delete']);
    Route::put('declineappointment/{id}', [AppointmentController::class, 'decline']);
    Route::get('getusedappslots/{date}/{section_id}', [AppointmentController::class, 'getUsedSlots']);

    Route::get('getschedules', [ScheduleController::class, 'getSchedules']);
    Route::post('createschedule', [ScheduleController::class, 'create']);
    Route::post('updateschedule', [ScheduleController::class, 'update']);

    Route::get('getconsultations', [ConsultationController::class, 'getConsultations']);
    Route::get('getapprovedconsultations', [ConsultationController::class, 'getApprovedConsultations']);
    Route::get('getdeclinedconsultations', [ConsultationController::class, 'getDeclinedConsultations']);
    Route::post('createconsultation', [ConsultationController::class, 'createConsultation']);
    Route::put('approveconsultation/{id}', [ConsultationController::class, 'approveConsultation']);
    Route::delete('deleteconsultation/{id}', [ConsultationController::class, 'deleteConsultation']);
    Route::put('declineconsultation/{id}', [ConsultationController::class, 'declineConsultation']);
    Route::get('numberofconsultations', [ConsultationController::class, 'getNbOfConsultations']);
    Route::get('getconspiechart', [ConsultationController::class, 'getConsPieChart']);
    Route::get('getusedconsslots/{date}/{major_id}', [ConsultationController::class, 'getUsedSlots']);
    Route::get('getdots', [ConsultationController::class, 'returnDots']);
    Route::get('getnumberofconsultations', [ConsultationController::class, 'getNumberOfConsultationsPerDoctor']);

    Route::get('userinfo', [UserController::class, 'getUserInfo']);
    Route::post('updateprofile', [UserController::class, 'updateProfile']);
    Route::get('numberofdoctors', [UserController::class, 'getNumberOfDoctors']);
    Route::get('numberofnurses', [UserController::class, 'getNumberOfNurses']);

    Route::post('updatepassword', [UserController::class, 'updatePassword']);
    Route::get('getconsultationsbydate/{date}', [ConsultationController::class, 'getConsultationByDate']);
    Route::get('getconsapp', [ConsultationController::class, 'getConsApp']);
});
