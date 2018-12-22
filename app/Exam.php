<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
      'name', 'start_date', 'duration', 'subject_id',
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
