<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date'   => 'required',
            'user_id'    => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $schedule = Schedule::create(

            $validator->validated(),

        );

        return response()->json([
            'status' => true,
            'message' => 'Schedule successfully created',
            'user' => $schedule
        ], 201);
    }

    public function update(Request $request){
        $id =$request->id;
        $validator = Validator::make($request->all(), [
			// 'dob' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
			'id' => 'required|integer',
            'start_date'  => 'required|date',
			'end_date'    =>   'required|date',
			'user_id' => 'required|integer',
		]);

        if ($validator->fails()) {
			return response()->json(array(
				"status" => false,
				"errors" => $validator->errors()
			), 400);
		}


        $schedule = Schedule::where('id', $id)->update(
			$validator->validated()
		);

		return response()->json([
			'status' => true,
			'message' => 'Schedule was successfully updated',
		], 201);
    }
    
    public function getSchedules()
    {
        $schedule = Schedule::all();
        return response()->json($schedule, 200);
    }

}
