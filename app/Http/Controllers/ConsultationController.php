<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $consultationsArray = array();
        $consultations = Consultation::all()->where('approved', 0);
        foreach ($consultations as $consultation) {
            $consultation->major;
            $consultationsArray[] = $consultation;
        }
        return response()->json($consultationsArray, 200);
    }
    public function getApprovedConsultations()
    {
        $consultationsArray = array();
        $consultations = Consultation::all()->where('approved', 1);
        foreach ($consultations as $consultation) {
            $consultation->major;
            $consultationsArray[] = $consultation;
        }

        return response()->json($consultationsArray, 200);
    }
    public function getDeclinedConsultations()
    {
        $consultationsArray = array();
        $consultations = Consultation::all()->where('approved', 2);
        foreach ($consultations as $consultation) {
            $consultation->major;
            $consultationsArray[] = $consultation;
        }

        return response()->json($consultationsArray, 200);
    }

    public function approveConsultation($id)
    {
        $consultation = Consultation::where('id', $id)->update(['approved' => 1]);
        return json_encode('Consultation was approved');
    }

    public function deleteConsultation($id)
    {
        $consultation = Consultation::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Consultation was deleted',
            'appointment' => $consultation
        ], 201);
    }

    public function getConsultationByDate($date)
    {
        $user = Auth::user();
        $major = $user->major->id;
        $consultation = Consultation::where('major_id', $major)
            ->where('date_of_consultation', $date)
            ->where('approved', 1)
            ->get();




        return response()->json($consultation, 200);
    }

    public function declineConsultation($id)
    {
        $consultation = Consultation::where('id', $id)->update(['approved' => 2]);
        return json_encode('Consultation was declined');
    }
    public function getNbOfConsultations()
    {
        $consultation = Consultation::all();
        $number_of_consultations = count($consultation);
        return response()->json($number_of_consultations, 200);
    }

    // public function getConsApp()
    // {
    //     $consultation = Consultation::all();
    //     $cons_month = array();
    //     foreach ($consultation as $cons) {
    //         $cons_date = $cons->date_of_consultation;
    //         $month = date("m", strtotime($cons_date));


    //         for ($i = 1; $i <= 12; $i++) {
    //             if ($month == $i) {
    //                 $cons_month[$i] = 0;
    //                 $cons_month[$i] = $var + 1;

    //             }
    //         }
    //     }
    // }
    public function getConsApp()
    {

        $consultations = Consultation::select('date_of_consultation')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->date_of_consultation)->format('m'); // grouping by months
            });
        $consultation_count = [];
        $consultation_array = [];

        foreach ($consultations as $key => $value) {
            $consultation_count[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($consultation_count[$i])) {
                $consultation_array[$i] = $consultation_count[$i];
            } else {
                $consultation_array[$i] = 0;
            }
        }

        $appointments = Appointment::select('date_of_appointment')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->date_of_appointment)->format('m'); // grouping by months
            });
        $appointment_count = [];
        $appointment_array = [];

        foreach ($appointments as $key => $value) {
            $appointment_count[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($appointment_count[$i])) {
                $appointment_array[$i] = $appointment_count[$i];
            } else {
                $appointment_array[$i] = 0;
            }
        }
        $cons_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $cons_app_array = array(array());


        for ($i = 0; $i < sizeof($cons_month); $i++) {
            $cons_app_array[$i][0] = $cons_month[$i];
            $cons_app_array[$i][1] = $consultation_array[$i+1];
            $cons_app_array[$i][2] = $appointment_array[$i+1];
        }



        return response()->json($cons_app_array, 200);
    }
}
