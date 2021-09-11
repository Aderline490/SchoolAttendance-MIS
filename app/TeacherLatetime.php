<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherLatetime extends Model
{
    public $timestamps = false;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
