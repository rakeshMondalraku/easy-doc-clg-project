<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Http\Request;

class PatientQueryController extends Controller
{
    public function query(Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'email' => ['required', 'email'],
			'subject' => ['required'],
			'message' => ['required']
		]);

		$query = new Query;
		$query->name = $request->name;
		$query->email = $request->email;
		$query->subject = $request->subject;
		$query->message = $request->message;
        

		if($query->save()){
			return redirect()->back()->withSuccess(['Successfully submitted you Query']);
		} else {
			return redirect()->back()->withErrors(['Something went wrong! Try again']);
		}
	}

}
