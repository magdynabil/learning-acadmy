<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded=['id'];
    public function cat()
    {
        return $this->belongsTo('App\Cat','cat_id');
    }
    public function Trainer()
    {
        return $this->belongsTo('App\Trainer','trainer_id');
    }
    public function students()
    {
        return $this->belongsToMany('App\Student','course_students','course_id','student_id');
    }
    //
}
