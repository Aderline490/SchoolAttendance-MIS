<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'name';
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    public function latetime()
    {
        return $this->hasMany(Latetime::class);
    }
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
    public function schedules()
    {
        return $this->belongsToMany('App\Schedule', 'schedule_teachers', 'teacher_id', 'schedule_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'address', 'dob', 'phone', 'email'
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
