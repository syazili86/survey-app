<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [];

    protected $table = '_SurveyReport';
    public $timestamps = false;

    public function ReportDetail(){
        return $this->hasMany(ReportDetail::class, 'EnrollHeaderID', 'EnrollHeaderID');
    }
}
