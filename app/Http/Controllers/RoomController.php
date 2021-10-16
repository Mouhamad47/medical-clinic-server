<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    //
    public function createRoom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $room = Room::create(

            $validator->validated(),

        );

        return response()->json([
            'status' => true,
            'message' => 'Room successfully created',
            'user' => $room
        ], 201);
    }

    public function updateRoom(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
			// 'dob' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
			'id' => 'required|integer',
            'name' => 'required|string',
           
		]);

        if ($validator->fails()) {
			return response()->json(array(
				"status" => false,
				"errors" => $validator->errors()
			), 400);
		}


        $room = Room::where('id', $id)->update(
			$validator->validated()
		);

		return response()->json([
			'status' => true,
			'message' => 'Room was successfully updated',
		], 201);
    }

    public function deleteRoom($id)
    {
        $room = Room::where('id',$id);
        $room->delete();  
		return json_encode('Room was deleted');
    }

    public function getRooms()
    {
        $room = Room::all();
        return response()->json($room, 200);
    }
}
