<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = "patient";
    protected $fillable = ['name','age','phone'];
    protected $guarded =['id'];
}
