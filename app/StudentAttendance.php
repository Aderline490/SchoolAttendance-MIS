<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
