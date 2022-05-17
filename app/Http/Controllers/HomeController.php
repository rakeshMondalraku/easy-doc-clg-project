<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function doctors()
    {
        $doctors = Doctor::with(['specialization', 'availabilities'])->get();

        return view('doctors', compact('doctors'));
    }
}
