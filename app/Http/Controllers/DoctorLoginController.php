<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{

	public function index()
	{
		return view('doctor.login');
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => ['required', 'email'],
			'password' => ['required']
		]);

		$loginAttempt = Auth::guard('doctor')->attempt([
			'email' => $request->email,
			'password' => $request->password
		], $request->remember);

		if ($loginAttempt) {
			dd('done');
			$request->session()->regenerate();
			return redirect()->intended('/doctor/dashboard');
		} else {
			return redirect()->back()->withErrors(['Invalid login credentials']);
		}
	}

	public function logout(Request $request)
	{
		Auth::guard('doctor')->logout();

		$request->session()->invalidate();

		return redirect('/doctor/login');
	}
}
