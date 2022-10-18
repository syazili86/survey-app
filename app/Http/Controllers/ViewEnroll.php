<?php

namespace App\Http\Controllers;

use App\Models\ViewEnrollOfStudent;
use Illuminate\Http\Request;

class ViewEnroll extends Controller
{
    public function index(Request $request){
        $request->validate([
            'userid' => 'required'
        ]);

        $data = ViewEnrollOfStudent::where('Userid', $request->userid)->orderBy('Semester', 'ASC')->get();
    
        return response()->json($data, 200);
    }
}
