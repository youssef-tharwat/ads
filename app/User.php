<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'tp', 'birthday', 'IDC', 'course', 'intake', 'phone_number', 'department',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course(){
        return $this->hasMany('Course');
    }

    public function exams(){
        return $this->belongsToMany('App\Exam' , 'user_exams');

    }

    public function subjects(){
        return $this->belongsToMany('App\Subject' , 'user_subjects');

    }

}
