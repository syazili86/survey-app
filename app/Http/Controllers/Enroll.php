<?php

namespace App\Http\Controllers;

use App\Models\EnrollOfStudent;
use App\Models\Survey;
use App\Models\User;
use App\Models\ViewEnrollOfStudent;
use Illuminate\Http\Request;

class Enroll extends Controller
{
    public function index(Request $request){
        $userid = $request->session()->get('id') ? $request->session()->get('id') : 0;
        $enrol = ViewEnrollOfStudent::where('userid', $userid)->get(); 

        $semester = [];
        foreach ($enrol as $key => $item) {
            if($key !== 0 && !in_array($item->Semester, $semester)){
                array_push($semester, $item->Semester);
            }
        }

        $survey = Survey::all();

        return view('enrol/lists', ['semester' => $semester, 'enrol' => $enrol, 'survey'=>$survey]);
    }

    public function doSurvey(Request $request){
        $this->validate($request,[
            'enrollid' => 'required',
            'surveyid' => 'required',
        ]);

        $userid = $request->session()->get('id') ? $request->session()->get('id') : 0;

        $enrol = EnrollOfStudent::where('EnrollID',(int) $request->enrollid)->where('userid',(int) $userid)->first();
        $survey = Survey::where('id',(int) $request->surveyid)->first();

        $request->session()->remove('flashMsg');
        if ($enrol == null || $survey == null) {
            $request->session()->put('flashMsg', "Gagal disimpan");
            return redirect('/enrol');
        }

        $enrol->surveyid = $survey->id;

        $saved = $enrol->save();
        if(!$saved){
            $request->session()->put('flashMsg', "Gagal disimpan, tidak diketahui");
            return redirect('/enrol');
        }

        return redirect('/enrol');
    }
}
