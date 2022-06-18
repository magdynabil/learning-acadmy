<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index()
   {
       $data['setting']=setting::first();
       return view('Front.contact.index')->with($data);
   }
}
