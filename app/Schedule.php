<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function students()
    {
        return $this->belongsToMany('App\Student','schedule_students','schedule_id', 'student_id');
    }
    public function teachers(){
        return $this->belongsToMany('App\Teacher', 'schedule_teachers', 'schedule_id', 'teacher_id');
    }
}
