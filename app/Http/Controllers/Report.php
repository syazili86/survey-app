<?php

namespace App\Http\Controllers;

use App\Models\Report as ModelsReport;
use App\Models\ReportDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Report extends Controller
{
    public function index(){
        $css = ['https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css'];
        $js = [
            'https://code.jquery.com/jquery-3.5.1.js',
            'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
            'https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js',
        ];

        $data = ModelsReport::all();
        return view('report/index', ['extra' => ['css' => $css, 'js' => $js], 'data' => $data]);
    }

    public function detail(Request $request, $id){
        $id = $id ?? 0;        

        $css = ['https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css'];
        $js = [
            'https://code.jquery.com/jquery-3.5.1.js',
            'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
            'https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js',
        ];

        $data = ReportDetail::where('EnrollHeaderID', $id)->get();

        $data = json_encode($data);
        $dataManipulated = array_map(function($item){
            $maxValue = max(array_column(json_decode($item->options), 'value'));
            $item->options = $maxValue;
            $item->score = round((100 / (($maxValue*$item->questions)*$item->respondent)) * $item->values); 
            return $item;
        }, json_decode($data));

        return view('report/detail', ['extra' => ['css' => $css, 'js' => $js], 'data' => json_encode($dataManipulated)]);
    }
}