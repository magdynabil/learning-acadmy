<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=['id'];
    public function courses()
    {
        return $this->belongsToMany('App\Course','course_students','student_id','course_id')->withPivot('status');
    }
    //
}
