<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;

class CourseController extends Controller
{
    public function cat($id)
    {
      $data['Cat'] = Cat::findOrFail($id) ;
      $data['Courses'] = Course::where('cat_id',$id)->paginate(3);
      return view('Front.Courses.Cat')->with($data);

    }
    public function show($id,$c_id)
    {
        $data['Courses'] = Course::findOrFail($c_id);
        return view('Front.Courses.show')->with($data);
    }

}
