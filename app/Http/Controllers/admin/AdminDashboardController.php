<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $doctors = Doctor::count();
        $patients = Patient::count();

        return view('admin.dashboard', compact('doctors', 'patients'));
    }
}
