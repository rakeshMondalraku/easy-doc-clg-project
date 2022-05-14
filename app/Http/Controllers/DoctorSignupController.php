<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorSignupController extends Controller
{
    //
    public function signup(Request $request){
      dd($request->all());  
    }
}
