<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use App\Student;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Studentcontroller extends Controller
{
    public function index()
    {
        $data['students'] = Student::select('id', 'name','email','phone','specialty')->OrderBy('id','desc')->paginate(10);
        return view('Admin.students.index')->with($data);
    }

    public function create()
    {

        return view('Admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:students',
            'phone'=>'nullable|string|max:11',
            'specialty'=>'nullable|string|max:191',

        ]);
        Student::create($data);
        return redirect(route('admin.students.index'));
    }
    public function edit($id)
    {

        $data['student']=Student::findOrfail($id);

        return view('Admin.students.edit')->with($data);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:students',
            'phone'=>'nullable|string|max:11',
            'specialty'=>'nullable|string|max:191',
        ]);
        Student::findOrfail($request->id)->update($data);
        return redirect(route('admin.students.index'));
    }
    public function delete($id)
    {
        Student::findOrfail($id)->delete();
        return redirect(route('admin.students.index'));
    }
    public function showCourses($id)
    {
        $data['courses']=Student::findOrfail($id)->courses;
        $data['student_id']=$id;
        return view('admin.students.showCourses')->with($data);
    }
    public function approveCourse($id,$c_id)
    {
        DB::table('course_students')
            ->where('student_id',$id)
            ->where('course_id',$c_id)
            ->update(['status'=>'approve']);
        return back();

    }
    public function rejectCourse($id,$c_id)
    {
        DB::table('course_students')
            ->where('student_id',$id)
            ->where('course_id',$c_id)
            ->update(['status'=>'reject']);
        return back();

    }
    public function add_to_course($id)
    {
        $data['student']=Student::findOrfail($id);
        $data['courses']=Course::select('id','name')->get();
        return view('admin.students.addCourse')->with($data);

    }
    public  function addCourse(Request $request)
    {
        $data=$request->validate
        ([
            'id'=>'required|exists:students,id',
            'course_id'=>'required|exists:courses,id'
        ]);
        $old_course = DB::table('course_students')->select('course_id','student_id')->where('course_id','=',$data['course_id'])->where('student_id','=',$data['id'])->first();
        if (empty($old_course))
        {


            DB::table('course_students')->insert(
                [
                    'course_id'=>$data['course_id'],
                    'student_id'=>$data['id'],
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ]
            );
            return redirect(route('admin.students.showCourses',$data['id']));
        }
        else
        {
            return back();
        }



    }
}
