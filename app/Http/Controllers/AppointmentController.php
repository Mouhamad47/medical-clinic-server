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
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'phone_number' => 'required|string|between:2,8',
            'address' => 'required|string|between:2,100',
            'start_date' => 'required',
            'end_date' => 'required',
            'section_id' => 'required'
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


    public function update($id)
    {
        $appointment = Appointment::where('id', $id)->update(['approved' => 1]);
        return json_encode('Appointment was approved');
    }

    public function delete($id)
    {
        $appointment = Appointment::where('id', $id)->delete();
        return json_encode('Appointment was deleted');
    }

    public function getAppointments()
    {
        $appointment = Appointment::all();
        return response()->json($appointment, 200);
    }
}
