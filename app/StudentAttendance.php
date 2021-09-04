<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public $timestamp = false;
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
