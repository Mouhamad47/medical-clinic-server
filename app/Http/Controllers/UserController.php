<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public function getAllDoctors()
	{
		$doctors = User::where('role', 2)->get();
		foreach ($doctors as $doctor) {
			$doctor->major;
		}
		return json_decode($doctors);
	}





	public function getAllNurses()
	{
		$nurses = User::where('role', 3)->get();
		foreach ($nurses as $nurse) {
			$nurse->major;
		}
		return json_decode($nurses);
	}

	public function getUserInfo()
	{
		return response()->json(auth()->user());
	}

	public function updateProfile(Request $request)
	{
		$user = Auth::user();
		$id = $user->id;
		$validator = Validator::make($request->all(), [
			'first_name' => 'string|between:2,100',
			'last_name' => 'string|between:2,100',
			'address' => 'string|between:2,100',

		]);
		if ($validator->fails()) {
			return response()->json(array(
				"status" => false,
				"errors" => $validator->errors()
			), 400);
		}

		$update_profile = User::where('id', $id)->update(
			$validator->validated()
		);

		return response()->json([
			'status' => true,
			'message' => 'Profile was successfully updated',
		], 201);
	}

	public function getNumberOfDoctors(){
		$doctor = User::all()->where('role', 2);
		$number_of_doctors = count($doctor);
        return response()->json($number_of_doctors, 200);

	}
	public function getNumberOfNurses(){
		$nurse = User::all()->where('role',3);
		$number_of_nurses = count($nurse);
        return response()->json($number_of_nurses, 200);


	}
	public function deleteDoctor($id){
		$doctor = User::where('id',$id);
		$doctor ->delete();
		return json_encode('Doctor was deleted ');

	}
	public function deleteNurse($id){
		$nurse = User::where('id',$id);
		$nurse ->delete();
		return json_encode('Nurse was deleted ');

	}
	public function selectAllUserExceptLogged($id){
		$array = array();
		$user = User::all()->where('id', '!=',$id);
		foreach($user as $u){
			$array[] = $u;
		}
		return response()->json($array);
	}

	public function updatePassword(Request $request)
	{
		$user = Auth::user();
		$id = $user->id;

		$validator = Validator::make($request->all(), [
			'current_password' => 'string|between:2,100',
			'new_password' => 'string|between:2,100',

		]);
		if ($validator->fails()) {
			return response()->json(array(
				"status" => false,
				"errors" => $validator->errors()
			), 400);
		}
		$password = $user->password;
		$hashed_password = bcrypt($request->current_password) ;
		$new_password_hashed = bcrypt($request->new_password) ;
		// if ($password == $hashed_password) {
		// 	$update_profile = User::where('id', $id)->update('password',$new_password_hashed);
		// 	return response()->json([
		// 		'status' => true,
		// 		'message' => 'Password was successfully updated',
		// 	], 201);
		// }
		// else{
		// 	return response()->json([
		// 		'status' => false,
		// 		'message' => 'Wrong password ',
		// 	], 404);
		// }
		dd($password,$hashed_password,$new_password_hashed);
	}
}
