<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use App\Course;
use App\Trainer;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Coursecontroller extends Controller
{
    public function index()
    {
        $data['courses'] = Course::select('id', 'name','price','img')->OrderBy('id','desc')->paginate(15);
        return view('Admin.courses.index')->with($data);
    }

    public function create()
    {
        $data['trainers']=Trainer::select('id','name')->get();
        $data['categories']=Cat::select('id','name')->get();

        return view('Admin.courses.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'small_desc'=>'required|string|max:191',
            'desc'=>'required|string',
            'price'=>'required|integer',
            'cat_id'=>'required|integer|exists:cats,id',
            'trainer_id'=>'required|integer|exists:trainers,id',
            'img'=>'required|image|mimes:jpeg,png,jpg'
        ]);

        $new_name=$data['img']->hashName();
        Image::make($data['img'])->resize(970,520)->save(public_path('Uploads/Cources/'.$new_name));
        $data['img']=$new_name;
        Course::create($data);
        return redirect(route('admin.courses.index'));
    }
    public function edit($id)
    {
        $data['trainers']=Trainer::select('id','name')->get();
        $data['categories']=Cat::select('id','name')->get();
        $data['courses']=Course::findOrfail($id);

        return view('Admin.courses.edit')->with($data);
    }
    public function update(Request $request)
    {
        $old_name= Course::findOrfail($request->id)->img;
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'small_desc'=>'required|string|max:191',
            'desc'=>'required|string',
            'price'=>'required|integer',
            'cat_id'=>'required|integer|exists:cats,id',
            'trainer_id'=>'required|integer|exists:trainers,id',
            'img'=>'nullable|image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('img'))
        {
            Storage::disk('Uploads')->delete('Cources/'.$old_name);
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(970,520)->save(public_path('Uploads/Cources/'.$new_name));
            $data['img']=$new_name;
        }

        else
        {
            $data['img']=$old_name;

        }

        Course::findOrfail($request->id)->update($data);
        return redirect(route('admin.courses.index'));
    }
    public function delete($id)
    {
        $old_name= Course::findOrfail($id)->img;
        Storage::disk('Uploads')->delete('Cources/'.$old_name);
        Course::findOrfail($id)->delete();
        return redirect(route('admin.courses.index'));
    }
}
