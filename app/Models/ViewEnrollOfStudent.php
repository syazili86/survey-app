<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewEnrollOfStudent extends Model
{
    protected $visible = ['EnrollID','Desk','SubjectsCode','ClassCode','SCU','LectureName','surveyid'];
    protected $fillable = [];

    protected $table = 'ListOfStudentEnrollSchedule';
    public $timestamps = false;

    public function StudentStatus(){
        return $this->belongsTo(StudentStatus::class, 'AcademicYearId', 'AcademicYearID');
    }
}
