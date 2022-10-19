<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyEnrol extends Model
{
    use HasFactory;
    protected $fillable = ['EnrollID','surveyid','value'];
}
