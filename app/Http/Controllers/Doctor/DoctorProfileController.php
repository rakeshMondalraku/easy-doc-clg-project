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

class DoctorProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('doctor')->user();
        $specializations = Specialization::all();

        return view('doctor.profile', compact('user', 'specializations'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('doctor')->user();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($user->id)],
        ]);

        $request->validate([
            'name' => ['required'],
            'age' => ['required', 'integer'],
            'gender' => ['required'],
            'qualification' => ['required'],
            'specialization' => ['required'],
            'experience' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($user->id)],
            'mobile' => ['required', Rule::unique('doctors')->ignore($user->id)],
            'registration_number' => ['required', Rule::unique('doctors')->ignore($user->id)]
        ]);

        $doctor = Doctor::find($user->id);
        $doctor->name = $request->name;
		$doctor->age = $request->age;
		$doctor->gender = $request->gender;
		$doctor->qualification = $request->qualification;
		$doctor->specialization_id = $request->specialization;
		$doctor->experience = $request->experience;
		$doctor->email = $request->email;
		$doctor->mobile = $request->mobile;
		$doctor->registration_number = $request->registration_number;

        if ($doctor->save()) {
            return redirect()->back()->withSuccess(['Profile has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }

    public function showChangePassword()
    {
        return view('doctor.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::guard('doctor')->user();

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
        ]);

        $doctor = Doctor::find($user->id);
        $doctor->password = Hash::make($request->password);

        if ($doctor->save()) {
            return redirect()->back()->withSuccess(['Password has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }
}
