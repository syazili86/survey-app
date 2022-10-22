<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYearID extends Model
{
    protected $visible = ['AcademicYearID','FlagActive'];
    protected $fillable = [];

    protected $table = 'AcademicYearID';
    protected $primaryKey = 'AcademicYearID';
    public $timestamps = false;
}
