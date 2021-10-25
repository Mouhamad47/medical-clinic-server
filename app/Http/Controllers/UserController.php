<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
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
}
