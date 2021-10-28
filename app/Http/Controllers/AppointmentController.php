<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'          => 'required|string|between:2,100',
            'last_name'           => 'required|string|between:2,100',
            'phone_number'        => 'required|string|between:2,8',
            'address'             => 'required|string|between:2,100',
            'start_hour'          => 'required',
            'end_hour'            => 'required',
            'date_of_appointment' => 'required',
            // 'approved'            => 'required',
            'section_id'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $user = Appointment::create(

            $validator->validated(),

        );

        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    public function approve($id)
    {
        $appointment = Appointment::where('id', $id)->update(['approved' => 1]);
        return json_encode('Appointment was approved');
    }

    public function delete($id)
    {
        $appointment = Appointment::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Appointment was deleted',
            'appointment' => $appointment
        ], 201);
    }

    public function getAppointments()
    {
        // $appointments = Appointment::all()->where('approved', 0);
        $appointmentsArray = array();
        $appointments = Appointment::all()->where('approved', 0);
        foreach ($appointments as $appointment) {
            $appointment->section;
            $appointmentsArray[] = $appointment;
        }
        return response()->json($appointmentsArray, 200);
    }

    public function getApprovedAppointments()
    {
        $appointmentsArray = array();
        $appointments = Appointment::all()->where('approved', 1);
        foreach ($appointments as $appointment) {
            $appointment->section;
            $appointmentsArray[] = $appointment;
        }
        return response()->json($appointmentsArray, 200);
    }

    public function decline($id)
    {
        $appointment = Appointment::where('id', $id)->update(['approved' => 2]);
        return json_encode('Appointment was declined');
    }
    
    public function getDeclinedAppointments()
    {
        $appointmentsArray = array();
        $appointments = Appointment::all()->where('approved', 2);
        foreach ($appointments as $appointment) {
            $appointment->section;
            $appointmentsArray[] = $appointment;
        }
        return response()->json($appointmentsArray, 200);
    }
}
