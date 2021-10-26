<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    //


    public function createConsultation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'             => 'required|string|between:2,100',
            'last_name'              => 'required|string|between:2,100',
            'phone_number'           => 'required|string|between:2,8',
            'address'                => 'required|string|between:2,100',
            'start_hour'             => 'required',
            'end_hour'               => 'required',
            'date_of_consultation'   => 'required',
            // 'approved'               => 'required',
            'major_id'               => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $consultation = Consultation::create(

            $validator->validated(),

        );

        return response()->json([
            'status' => true,
            'message' => 'Consultation successfully registered',
            'consultation' => $consultation
        ], 201);
    }



    public function getConsultations()
    {
        $consultations = Consultation::all();
        foreach($consultations as $consultation){
            $consultation->major;
        }
        return response()->json($consultations, 200);
    }

    public function approveConsultation($id)
    {
        $appointment = Consultation::where('id', $id)->update(['approved' => 1]);
        return json_encode('Consultation was approved');
    }

    public function declineConsultation($id){
        $consultation = Consultation::where('id', $id)->delete();
        return response()->json([
            'status'=>true,
            'message' => 'Consultation was deleted',
            'appointment' =>$consultation
        ],201);
    }


}
