<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    'name', 'course_id',
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_subjects', 'user_id','subject_id');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
