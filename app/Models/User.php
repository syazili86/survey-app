<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $visible = ['Userid','UserCode','prefix','suffix','FirstName','LastName'];
    protected $fillable = [];
    protected $hidden = ['UserPassword'];

    protected $table = 'UserMaster';
    public $timestamps = false;
}
