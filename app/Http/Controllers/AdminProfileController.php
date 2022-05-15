<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
        ]);

        $admin = Admin::find($user->id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($admin->save()) {
            return redirect()->back()->withSuccess(['Profile has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }

    public function showChangePassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
        ]);

        $admin = Admin::find($user->id);
        $admin->password = Hash::make($request->password);

        if ($admin->save()) {
            return redirect()->back()->withSuccess(['Password has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }
}
