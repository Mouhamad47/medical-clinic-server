<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_number' => 'required|string|min:8',
            'address' => 'required',
            'degree' => 'required',
            'experience_description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $job_application = JobApplication::create(
            $validator->validated(),


        );
        // $user = JobApplication::create(array_merge(
        //     $validator->validated(),
        // 	['password' => bcrypt($request->password)]

        // ));

        return response()->json([
            'status' => true,
            'message' => 'Job App successfully added',
            'user' => $job_application
        ], 201);
    }

    public function decline($id){
        $job_application = JobApplication::where('id',$id);
        $job_application->delete();  
		return json_encode('Job Application Declined ');

    }
    
    public function getJobApp()
    {
        $job_application = JobApplication::all();
        return response()->json($job_application, 200);
    }


}
