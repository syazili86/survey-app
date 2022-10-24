<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    protected $fillable = [];

    protected $table = '_SurveyReportDetail';
    public $timestamps = false;

    public function ReportHeader(){
        return $this->belongsTo(Report::class, 'EnrollHeaderID', 'EnrollHeaderID');
    }
}
