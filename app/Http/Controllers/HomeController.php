<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        $doctors = Doctor::with(['specialization'])->get();

        return view('home', compact('doctors'));
    }

    public function doctors()
    {
        $doctors = Doctor::with(['specialization', 'availabilities'])->get();

        return view('doctors', compact('doctors'));
    }
}
