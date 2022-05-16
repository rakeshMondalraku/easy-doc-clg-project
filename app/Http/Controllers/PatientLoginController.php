<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;


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

	public function signup(Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'age' => ['required', 'integer'],
			'gender' => ['required'],
			'address' => ['required'],
			'email' => ['required', 'email', Rule::unique('patients')],
			'mobile' => ['required', Rule::unique('patients')],
			'password' => ['required', 'confirmed', Password::min(8)
				->letters()
				->mixedCase()
				->numbers()
				->symbols()
				->uncompromised()]
		]);

		$patient = new Patient;
		$patient->name = $request->name;
		$patient->age = $request->age;
		$patient->gender = $request->gender;
		$patient->address = $request->address;
		$patient->email = $request->email;
		$patient->mobile = $request->mobile;
		$patient->password = Hash::make($request->password);

		if($patient->save()){
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
			return response()->json(['message' => 'Signup successful! Login in your account'], 200);
		} else {
			return response()->json(['message' => 'Something went wrong! Try again'], 400);
		}
	}
}
