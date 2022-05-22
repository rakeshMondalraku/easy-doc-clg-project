<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('doctor')->user();
        $pending = Appointment::where('doctor_id', $user->id)->where('status', 'pending')->count();
        $approved = Appointment::where('doctor_id', $user->id)->where('status', 'approved')->count();
        $completed = Appointment::where('doctor_id', $user->id)->where('status', 'completed')->count();
        $canceled = Appointment::where('doctor_id', $user->id)->where('status', 'canceled')->count();
        return view('doctor.dashboard', compact('pending', 'approved', 'completed', 'canceled'));
    }
}
