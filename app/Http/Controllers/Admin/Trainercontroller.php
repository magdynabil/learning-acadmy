<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;
class Trainercontroller extends Controller
{
    public function index()
    {
        $data['Trainers'] = Trainer::select('id', 'name','phone','specialty','img')->OrderBy('id','desc')->get();
        return view('Admin.trainers.index')->with($data);
    }

    public function create()
    {

        return view('Admin.trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'phone'=>'nullable|string|max:11',
            'specialty'=>'required|string|max:191',
            'img'=>'required|image|mimes:jpeg,png,jpg'
        ]);

        $new_name=$data['img']->hashName();
        Image::make($data['img'])->resize(50,50)->save(public_path('Uploads/Trainers/'.$new_name));
        $data['img']=$new_name;
        Trainer::create($data);
        return redirect(route('admin.trainers.index'));
    }
    public function edit($id)
    {

        $data['Trainer']=Trainer::findOrfail($id);

        return view('Admin.trainers.edit')->with($data);
    }
    public function update(Request $request)
    {
        $old_name= Trainer::findOrfail($request->id)->img;
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'phone'=>'nullable|string|max:11',
            'specialty'=>'required|string|max:191',
            'img'=>'nullable|image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('img'))
        {
            Storage::disk('Uploads')->delete('Trainers/'.$old_name);
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(50,50)->save(public_path('Uploads/Trainers/'.$new_name));
            $data['img']=$new_name;
        }

        else
        {
            $data['img']=$old_name;

        }

        Trainer::findOrfail($request->id)->update($data);
        return redirect(route('admin.trainers.index'));
    }
    public function delete($id)
    {
        $old_name= Trainer::findOrfail($id)->img;
        Storage::disk('Uploads')->delete('Trainers/'.$old_name);
        Trainer::findOrfail($id)->delete();
        return redirect(route('admin.trainers.index'));
    }
}
