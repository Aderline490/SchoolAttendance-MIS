<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherLeave extends Model
{
    public $timestamps = false;
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}   
