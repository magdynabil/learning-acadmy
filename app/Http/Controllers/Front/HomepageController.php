<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Sitecontent;
use Illuminate\Http\Request;
use App\Course;
use App\Trainer;
use App\Tesimonial;
use App\Student;

class HomepageController extends Controller
{
    public function index(){
        $data['banner']=Sitecontent::select('content')->where('name','banner')->first();
        $data['feature']=Sitecontent::select('content')->where('name','Feature')->first();
        $data['Courses']=Course::select(
            'id',
            'name',
            'small_desc',
            'cat_id',
            'trainer_id',
            'img',
            'price'
        )
            ->orderBy('id','desc')
            ->take(3)
            ->get();
        $data['Courses_count']=Course::count();
        $data['Trainers_count']=Trainer::count();
        $data['Students_count']=Student::count();
        $data['Tesimonials']=Tesimonial::select(
            'id',
            'name',
            'desc',
            'specialty',
            'img'
        )
            ->orderBy('id','desc')
            ->take(6)
            ->get();
        return view('front/index')->with($data);
    }
    //
}
