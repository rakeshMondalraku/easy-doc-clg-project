<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PatientProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('patient')->user();
        return view('profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::guard('patient')->user();

        $request->validate([
            'name' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'mobile' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
            'address' => ['required'],
        ]);

        $patient = Patient::find($user->id);
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->mobile = $request->mobile;
        $patient->email = $request->email;
        $patient->address = $request->address;

        if ($patient->save()) {
			return response()->json(['message' => 'Profile has been updated!'], 200);
        } else {
            return response()->json(['message' => 'Something went wrong! Try again'], 400);
        }
    }
}
