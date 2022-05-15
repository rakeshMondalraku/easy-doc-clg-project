<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
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

        return view('doctor.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('doctor')->user();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($user->id)],
        ]);

        $doctor = Doctor::find($user->id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;

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
