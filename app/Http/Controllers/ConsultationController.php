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
            'first_name'   => 'required|string|between:2,100',
            'last_name'    => 'required|string|between:2,100',
            'phone_number' => 'required|string|between:2,8',
            'address'      => 'required|string|between:2,100',
            'start_date'   => 'required',
            'end_date'     => 'required',
            'spec'         => 'required'
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
            'user' => $consultation
        ], 201);
    }



    public function getConsultations()
    {
        $consultation = Consultation::all();
        return response()->json($consultation, 200);
    }



}
