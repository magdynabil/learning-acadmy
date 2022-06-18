<?php

namespace App\Http\Controllers\Front;
use App\Newsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Student;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function newsletter(Request $request)
    {
        $data=$request->validate
        ([
            'email'=>'required|email'
        ]);

        Newsletter::create($data);
        return back();
    }
    public function contact(Request $request)
    {
        $data=$request->validate
        ([
            'message'=>'required|string|max:10000',
            'name'=>'required|string|max:191',
            'email'=>'required|email',
            'subject'=>'nullable|string|max:191'
        ]);
        Message::create($data);
        return back();

    }
    public function enroll(Request $request)
    {
        $data=$request->validate
        ([
            'name'=>'required|string|max:191',
            'email'=>'required|email',
            'phone'=>'required|string|max:11',
            'specialty'=>'nullable|string|max:191',
            'course_id'=>'required|exists:courses,id'
        ]);
        $old_student=Student::select('id')->where('email',$data['email'])->first();
        if ($old_student==null)
        {
            $student=Student::create([
                'name'=>$data['name'] ,
                'email'=>$data['email'] ,
                'phone'=>$data['phone'] ,
                'specialty'=>$data['specialty']
            ]);
            $student_id=$student->id;
        }
        else
        {
            $student_id=$old_student->id;
            if ($data['name']!=null)
            {
                $old_student->update(['name'=>$data['name'],]);
            }
            if ($data['phone']!=null)
            {
                $old_student->update(['phone'=>$data['phone'],]);
            }
            if ($data['specialty']!=null)
            {
                $old_student->update(['specialty'=>$data['specialty'],]);
            }
        }
       $old_course = DB::table('course_students')->select('course_id')->where('course_id','=',$data['course_id'])->where('student_id','=',$student_id)->first();
        if (empty($old_course))
        {

            DB::table('course_students')->insert(
                [
                    'course_id'=>$data['course_id'],
                    'student_id'=>$student_id,
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ]
            );
            return back();
        }
        else
        {
            return back();
        }


    }
}
