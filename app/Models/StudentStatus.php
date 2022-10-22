<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentStatus extends Model
{
    protected $visible = ['AcademicYearID','Userid','StatusID'];
    protected $fillable = [];

    protected $table = 'StudentStatus';
    protected $primaryKey = 'StudentActiveID';
    public $timestamps = false;

    public function AcademicYearID(){
        return $this->belongsTo(AcademicYearID::class, 'AcademicYearID', 'AcademicYearID');
    }
}
