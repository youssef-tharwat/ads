<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user(){
        return $this->belongsTo('User');
    }

    public function subjects(){
        return $this->hasMany('App\Subject');
    }
}
