<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function createBed(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number'    =>   'required|integer',
            'room_id'   =>   'required|integer',
            
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }
        $bed = Bed::create(
            $validator->validated(),
        );
        return response()->json([
            'status' => true,
            'message' => 'Bed successfully added',
            'user' => $bed
        ], 201);
    }

    public function deleteBed($id)
    {
        $bed = Bed::where('id',$id)->delete();
        return json_encode('Bed Was deleted');
    }
    
    public function updateBed()
    {

    }

    public function getBeds()
    {
        $bed = Bed::all();
        return response()->json($bed, 200);
    }
}
