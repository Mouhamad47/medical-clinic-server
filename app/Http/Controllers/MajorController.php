<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    //
    public function getMajors()
    {
        $majors = Major::all()->take(8);
        return response()->json($majors, 200);
    }
    public function lastTwo()
    {
        $majors = Major::all()->take(-2);
        foreach ($majors as $major) {
            $majorsArray[] = $major;
        }
        return response()->json($majorsArray, 200);
        

    }
}
