<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function getSections(){
        $majors = Section::all();
        return response()->json($majors,200);
    }

}
