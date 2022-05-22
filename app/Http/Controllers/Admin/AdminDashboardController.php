<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $doctors = Doctor::count();
        $patients = Patient::count();
        $pending = Appointment::where('status', 'pending')->count();
        $approved = Appointment::where('status', 'approved')->count();
        $completed = Appointment::where('status', 'completed')->count();
        $canceled = Appointment::where('status', 'canceled')->count();

        return view('admin.dashboard', compact('doctors', 'patients', 'pending', 'approved', 'completed', 'canceled'));
    }
}
