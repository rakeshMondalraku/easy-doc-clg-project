<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientLoginController extends Controller
{
    public function index()
	{
		return view('home');
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => ['required', 'email'],
			'password' => ['required']
		]);

		$loginAttempt = Auth::guard('patient')->attempt([
			'email' => $request->email,
			'password' => $request->password
		], $request->remember);

		if ($loginAttempt) {
			$request->session()->regenerate();
			return response()->json(['message' => 'Login success'], 200);
		} else {
			return response()->json(['message' => 'Invalid login credentials'], 400);
		}
	}

	public function logout(Request $request)
	{
		Auth::guard('patient')->logout();

		$request->session()->invalidate();

		return redirect('/');
	}
}
