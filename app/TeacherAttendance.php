<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    public $timestamp = false;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
