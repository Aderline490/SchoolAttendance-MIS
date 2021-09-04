<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentLatetime extends Model
{
    public $timestamp = false;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
        