<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollOfStudent extends Model
{
    protected $visible = ['EnrollID','surveyid'];
    protected $fillable = ['surveyid'];

    protected $table = 'Enroll';
    protected $primaryKey = 'EnrollID';
    public $timestamps = false;
}
