<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'name';
    }
    public function attendance()
    {
        return $this->hasMany(StudentAttendance::class);
    }
    public function latetime()
    {
        return $this->hasMany(StudentLatetime::class);
    }
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'class', 'section', 'address', 'dob', 'phone', 'email'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
