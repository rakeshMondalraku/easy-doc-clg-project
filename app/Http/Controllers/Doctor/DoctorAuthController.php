<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class DoctorAuthController extends Controller
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

	public function showSignupForm()
	{
		$specializations = Specialization::all();
		return view('doctor.signup', compact('specializations'));
	}

	public function signup(Request $request)
	{
		$request->validate([
			'name' => ['required'],
			'age' => ['required', 'integer'],
			'gender' => ['required'],
			'qualification' => ['required'],
			'specialization' => ['required'],
			'experience' => ['required'],
			'email' => ['required', 'email', Rule::unique('doctors')],
			'mobile' => ['required', Rule::unique('doctors')],
			'registration_number' => ['required', Rule::unique('doctors')],
			'password' => ['required', 'confirmed', Password::min(8)
				->letters()
				->mixedCase()
				->numbers()
				->symbols()
				->uncompromised()]
		]);

		$doctor = new Doctor;
		$doctor->name = $request->name;
		$doctor->age = $request->age;
		$doctor->gender = $request->gender;
		$doctor->qualification = $request->qualification;
		$doctor->specialization_id = $request->specialization;
		$doctor->experience = $request->experience;
		$doctor->email = $request->email;
		$doctor->mobile = $request->mobile;
		$doctor->registration_number = $request->registration_number;
		$doctor->password = Hash::make($request->password);

		if($doctor->save()){
			return redirect()->route('doctor.login')->withSuccess(['Signup successful! Login in your account']);
		} else {
			return redirect()->back()->withErrors(['Something went wrong! Try again']);
		}
	}
}
