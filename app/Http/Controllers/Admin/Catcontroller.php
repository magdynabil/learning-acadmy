<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Catcontroller extends Controller
{
    public function index()
    {
        $data['cats'] = Cat::select('id', 'name')->OrderBy('id','desc')->get();
        return view('Admin.categories.index')->with($data);
    }

    public function create()
    {

        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191'
        ]);
        Cat::create($data);
        return redirect(route('admin.cat.index'));
    }
    public function edit($id)
    {
        $data['category']=Cat::findOrfail($id);

        return view('Admin.categories.edit')->with($data);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191'
        ]);
        Cat::findOrfail($request->id)->update($data);
        return redirect(route('admin.cat.index'));
    }
    public function delete($id)
    {
        Cat::findOrfail($id)->delete();
        return redirect(route('admin.cat.index'));
    }
}
