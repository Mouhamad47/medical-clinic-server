<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // function updateProfile(Request $request)
	// {
	// 	$user = Auth::user();
	// 	$id = $user->id;
	// 	$validator = Validator::make($request->all(), [
	// 		'dob' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
	// 		'height' => 'integer',
	// 		'weight' => 'integer',
	// 		'nationality' => 'string|between:2,100',
	// 		'net_worth' => 'integer',
	// 		'currency' => 'string',
	// 		'bio' => 'string|max:400'
	// 	]);

	// 	if ($validator->fails()) {
	// 		return response()->json(array(
	// 			"status" => false,
	// 			"errors" => $validator->errors()
	// 		), 400);
	// 	}

	// 	$update_profile = User::where('id', $id)->update(
	// 		$validator->validated()
	// 	);

	// 	return response()->json([
	// 		'status' => true,
	// 		'message' => 'Profile was successfully updated',
	// 	], 201);
	// }
}
