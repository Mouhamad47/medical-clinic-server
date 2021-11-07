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
            'date_of_consultation'   => 'required',
            'major_id'               => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }
        $time = date("H:i", strtotime($request->start_hour));

        $end_hour_request = strtotime($time) + 1800;
        $end_hour = date("H:i", $end_hour_request);


        $consultation = Consultation::create(
            array_merge(
                $validator->validated(),
                ['end_hour' => $end_hour]
            )


        );

        return response()->json([
            'status' => true,
            'message' => 'Consultation successfully booked',
            'consultation' => $consultation
        ], 201);
    }
//     $consultation = Consultation::select(DB::raw('majors.name, COUNT(consultations.id) AS number_of_patients'))
//     ->join('majors', 'consultations.major_id', '=', 'majors.id')
//     ->groupBy('majors.name')->get();
// $cons_array_ob = array();
// foreach ($consultation as $cons) {
//     $cons_array_ob[] = $cons;
// }
// $cons_array = array(array());
// for ($i = 0; $i < sizeof($consultation); $i++) {
//     $cons_array[$i][0] = $cons_array_ob[$i]['name'];
//     $cons_array[$i][1] = $cons_array_ob[$i]['number_of_patients'];
// }
// return response()->json($cons_array, 200);



    public function getConsultations()
    {   
        $consultationsArray = array();
        // $consultations = Consultation::all()->where('approved', 0);
        // $consultations = DB::select(DB::raw("Select * from consultations, users.id, majors.name where consultations.major_id = users.major_id AND consultations.major_id = majors.id "));
           
        // $consultations = DB::table('consultations',)->join('users','users.major_id','=','consultations.major_id')->join('majors','consultations.major_id','=','majors.id')->get();
        $consultations = DB::table('consultations')->where('approved',0)
                            ->join('majors','majors.id','=','consultations.major_id')
                            ->join('users', 'users.major_id','=','consultations.major_id')
                            ->select('consultations.*','users.id as user_id','majors.name as major_name')
                            ->get();
        // foreach ($consultations as $consultation) {
        //     $consultation->major;
            
        //     $consultationsArray[] = $consultation;
        // }
        return response()->json($consultations, 200);
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
            $cons_app_array[$i][1] = $consultation_array[$i + 1];
            $cons_app_array[$i][2] = $appointment_array[$i + 1];
        }



        return response()->json($cons_app_array, 200);
    }

    public function getConsPieChart()
    {
        $consultation = Consultation::select(DB::raw('majors.name, COUNT(consultations.id) AS number_of_patients'))
            ->join('majors', 'consultations.major_id', '=', 'majors.id')
            ->groupBy('majors.name')->get();
        $cons_array_ob = array();
        foreach ($consultation as $cons) {
            $cons_array_ob[] = $cons;
        }
        $cons_array = array(array());
        for ($i = 0; $i < sizeof($consultation); $i++) {
            $cons_array[$i][0] = $cons_array_ob[$i]['name'];
            $cons_array[$i][1] = $cons_array_ob[$i]['number_of_patients'];
        }
        return response()->json($cons_array, 200);
    }

    public function getUsedSlots($date, $major_id)
    {
        $consultation = Consultation::select('start_hour')->where('date_of_consultation', $date)->where('major_id', $major_id)->get();
        $array = array();
       
        for ($i = 0; $i < sizeof($consultation); $i++) {
            $time = strtotime($consultation[$i]['start_hour']);
            $array[] = date("H:i", $time);
        }
      
        return response()->json($array, 200);
    }

    public function returnDots(){
        // $user = Auth::user();
        // {
        //     '2021-10-17':
        //     { dots:
        //         [massage]
        //     }
        // }
        ////
        $user = Auth::user();
        $major = $user->major->id;
        // $consultation = Consultation::where('major_id', $major)
        //     ->where('date_of_consultation', $date)
        //     ->where('approved', 1)
        //     ->get();
        $consultation = Consultation::select('date_of_consultation')->where('major_id',$major)
                                                                    ->where('approved',1)->get();
        $dots = array();
        // $dots [0]= "message";
        $object = (object) [
            'color' => 'red',
            
          ];
        $array = array();
        foreach($consultation as $cons){
            $date = $cons->date_of_consultation;
            $a1 = array(
                $date=>array(
                    'dots'=>$object
                )    
            );
            $array[] = $a1;
        }
        return response()->json($array, 200);
    }

    public function getNumberOfConsultationsPerDoctor(){
        $user = Auth::user();
        $id = $user->id;
        $consultation = Consultation::select(DB::raw('COUNT(consultations.id) AS number_of_patients'))
            ->join('majors', 'consultations.major_id', '=', 'majors.id')
            ->join('users','users.id','=',$id)
            ->get();
        
        return response()->json($consultation, 200);
    
        }
}
