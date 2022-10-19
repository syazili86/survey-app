<?php

namespace App\Http\Controllers;

use App\Models\EnrollOfStudent;
use App\Models\Survey;
use App\Models\SurveyCategory;
use App\Models\SurveyEnrol;
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

        $survey = SurveyCategory::with('Surveys')->get();

        return view('enrol/lists', ['semester' => $semester, 'enrol' => $enrol, 'survey'=>$survey]);
    }

    public function doSurvey(Request $request){
        $this->validate($request,[
            'enrollid' => 'required|numeric'
        ]);

        $request->session()->remove('flashMsg');

        $sc = SurveyCategory::with('Surveys')->get();
        
        foreach($sc as $cateogry){
            foreach($cateogry->surveys as $s){
                if(empty($request['radio'.$s->id])){
                    $request->session()->put('flashMsg', "Silahkan lengkapi kuisioner");
                    break;
                }

                $options = json_decode($cateogry->options);
                $keyCheck = array_search($request['radio'.$s->id], array_column($options, 'value'));
                if(!$keyCheck && $keyCheck !== 0){
                    $request->session()->put('flashMsg', "Data tidak dapat dimanipulasi");
                    break;
                }
            }
        }

        $userid = $request->session()->get('id') ? $request->session()->get('id') : 0;
        $enrol = EnrollOfStudent::where('EnrollID',(int) $request->enrollid)->where('userid',(int) $userid)->first();
        if ($enrol == null) {
            $request->session()->put('flashMsg', "Matakuliah tidak ditemukan");
        }

        if($request->session()->has('flashMsg')){
            return redirect('/enrol');
        }

        foreach($sc as $category){
            foreach($category->surveys as $s){
                $data = [
                    'EnrollID' => $enrol->EnrollID,
                    'surveyid' => $s->id,
                    'value' => $request['radio'.$s->id]
                ];

                $surveyEnrol = SurveyEnrol::where('EnrollID', $enrol->EnrollID)->where('surveyid', $s->id)->first();

                if ($surveyEnrol == null) {
                    $surveyEnrol = new SurveyEnrol($data);
                }else{
                    $surveyEnrol->value = $request['radio'.$s->id];
                }

                $surveyEnrol->save();
            }
        }

        return redirect('/enrol');

        // $userid = $request->session()->get('id') ? $request->session()->get('id') : 0;

        // $enrol = EnrollOfStudent::where('EnrollID',(int) $request->enrollid)->where('userid',(int) $userid)->first();
        // $survey = Survey::where('id',(int) $request->surveyid)->first();

        // $request->session()->remove('flashMsg');
        // if ($enrol == null || $survey == null) {
        //     $request->session()->put('flashMsg', "Gagal disimpan");
        //     return redirect('/enrol');
        // }

        // $enrol->surveyid = $survey->id;

        // $saved = $enrol->save();
        // if(!$saved){
        //     $request->session()->put('flashMsg', "Gagal disimpan, tidak diketahui");
        //     return redirect('/enrol');
        // }

        // return redirect('/enrol');
    }
}
